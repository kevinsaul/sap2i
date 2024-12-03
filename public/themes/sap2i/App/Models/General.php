<?php

namespace App\Models;

/**
 * General Model.
 */
class General
{
    /**
     * Define the name of custom post type used.
     *
     * @var string
     */
    protected $customPostType = 'post';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The relationships define to the model.
     *
     * @var array
     */
    protected $relationships = [];

    /**
     * Content the data.
     *
     * @var array
     */
    protected $original = [];

    /**
     * Content the data.
     *
     * @var array
     */
    protected $collection = [];

    /**
     * Set general field of post.
     *
     * @var array
     */
    private $_generalField = ['ID', 'title', 'permalink', 'slug', 'published', 'updated'];

    /**
     * Save the last query.
     *
     * @var WP_Query
     */
    private $_query;

    /**
     * Current page.
     *
     * @var int
     */
    private $_page;

    /**
     * Magic method triggered by calling isset() or empty() on inaccessible (protected or private) or non-existing properties.
     *
     * @param string $key
     *
     * @return bool or null
     */
    public function __isset($key)
    {
        if (isset($this->original[$key])) {
            return false === empty($this->original[$key]);
        }

        return null;
    }

    /**
     * Get data in original attributes.
     *
     * @param string $name
     *
     * @return string
     */
    public function __get($name)
    {
        return !empty($this->original[$name]) ? $this->original[$name] : '';
    }

    /**
     * Set data in original attributes.
     *
     * @param string $name
     * @param any    $value
     *
     * @return string
     */
    public function __set($name, $value)
    {
        $this->original[$name] = $value;

        return $this;
    }

    /**
     * Call method if we want normal call
     *
     * @return $this
     */
    public function __call($name, $arguments)
    {
        return call_user_func_array([$this, $name], $arguments);
    }

    /**
     * Call method if we want static call
     *
     * @return $this
     */
    public static function __callStatic($name, $arguments)
    {
        $class = get_called_class();
        $object = new $class();

        return call_user_func_array([$object, $name], $arguments);
    }

    /**
     * Serialize the collection to JSON
     *
     * @return string
     */
    protected function toJson()
    {
        if (!isset($this->collection)) {
            return json_encode($this->original);
        }

        return json_encode(array_map(function ($element) {
            return $element->original;
        }, $this->collection));
    }

    /**
     * Get all data of the model.
     *
     * @param int $perPage
     * @param int $page
     *
     * @return $this
     */
    protected function all($perPage = -1, $page = 1, $options = [])
    {
        $result = [];
        $args = array(
            'posts_per_page' => $perPage,
            'paged' => $page,
            'post_type' => $this->customPostType,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
        );

        if (!empty($options)) {
            $args = array_merge($args, $options);
        }

        $query = new \WP_Query($args);
        $this->_query = $query;
        $allData = $query->get_posts();
        if (!empty($allData)) {
            foreach ($allData as $post) {
                $result[] = $this->find($post);
            }
        }

        $this->collection = $result;
        $this->_page = $page;

        return $this;
    }

    /**
     * Get One Element by ID or WP_Post.
     *
     * @param int|WP_Post $postId
     *
     * @return $this
     */
    protected function find($postId, $selected = [])
    {
        $post = $postId;
        $object = new $this();
        unset($object->collection);
        unset($object->_query);

        if (is_numeric($postId)) {
            $post = get_post($postId);
        }

        $select = !empty($selected) ? $selected : $this->fillable;

        if (!empty($select)) {
            foreach ($select as $fill) {
                if (method_exists($this, $fill)) {
                    $value = $this->$fill($post);
                } else {
                    $value = $this->get_field($fill, $post);
                }

                $object->original[$fill] = $value;
            }
        }

        return $object;
    }

    /**
     * Create pagination by WP Query.
     *
     * @param int   $page
     * @param array $option
     *
     * @return string
     */
    protected function withPagination($option = [])
    {
        $total_pages = $this->_query->max_num_pages;

        $args = [
            'base' => get_pagenum_link(1).'%_%',
            'format' => '/page/%#%',
            'total' => $total_pages,
            'current' => max(1, $this->_page),
            'show_all' => false,
            'prev_next' => true,
            'type' => 'plain',
            'prev_text' => !empty($option['textLeft']) ? $option['textLeft'] : '«',
            'next_text' => !empty($option['textRight']) ? $option['textRight'] : '»',
        ];

        $this->pagination = paginate_links($args);

        return $this;
    }

    /**
     * Return the first element of $collection.
     */
    public function first()
    {
        if (!empty($this->collection)) {
            return $this->collection[0];
        }

        return [];
    }

    /**
     * Return content of $collection.
     *
     * @return array
     */
    protected function get()
    {
        $collection = $this->collection;

        return !array_key_exists('pagination', $this->original) ? $collection : [
            'data' => $collection,
            'pagination' => $this->original['pagination'],
        ];
    }

    /**
     * Get field by data.
     *
     * @param string  $key
     * @param WP_Post $post
     */
    protected function get_field($key, $post)
    {
        if (empty($post)) {
            return;
        }

        if (in_array($key, $this->_generalField)) {
            return $this->_getGeneralData($key, $post);
        } elseif (function_exists('get_field')) {
            return get_field($key, $post->ID);
        } else {
            return get_post_meta($post->ID, $key);
        }
    }

    /**
     * Return the result to array.
     *
     * @return array
     */
    protected function toArray()
    {
        $result = [];

        if (!empty($this->original)) {
            return $this->getOriginal();
        } elseif (!empty($this->collection)) {
            foreach ($this->collection as $object) {
                $result[] = $object->getOriginal();
            }
        }

        $this->collection = $result;

        return $this;
    }

    /**
     * Convert WP_Post to a model relation.
     *
     * @return $this
     */
    protected function checkRelation($data)
    {
        $result = [];
        $relationships = $this->_getRelations();
        
        if (!empty($data)) {
            if (!is_array($data)) {
                if (is_object($data) && is_a($data, 'WP_Post')) {
                    if (array_key_exists($data->post_type, $relationships)) {
                        $obj = new $relationships[$data->post_type]();
                        $data = $obj->find($data);
                    }
                    
                    $result = $data;
                }
            } else {
                foreach ($data as $d) {
                    if (is_object($d) && is_a($d, 'WP_Post')) {
                        if (array_key_exists($d->post_type, $relationships)) {
                            $obj = new $relationships[$d->post_type]();
                            $d = $obj->find($d);
                        }
                        
                        $result[] = $d;
                    }
                }
            }
        }

        return $result;
    }

    /**
     * Get $_query attribute.
     *
     * @return WP_Query
     */
    protected function getQuery()
    {
        return $this->_query;
    }

    /**
     * Get $fillable attribute.
     */
    public function getCustomPostType()
    {
        return $this->customPostType;
    }

    /**
     * Get $original attribute.
     */
    protected function getOriginal()
    {
        return $this->original;
    }

    /**
     * Get $fillable attribute.
     */
    protected function getFillable()
    {
        return $this->fillable;
    }

    /**
     * Set $original attribute.
     */
    protected function setOriginal(array $original)
    {
        $this->original = $original;

        return $this;
    }

    /**
     * Set $fillable attribute.
     *
     * @return $this
     */
    protected function setFillable(array $fillable)
    {
        $this->fillable = $fillable;

        return $this;
    }

    /**
     * Add one $fillable attribute.
     *
     * @return $this
     */
    protected function addFillable($fillable)
    {
        $this->fillable[] = $fillable;

        return $this;
    }

    /**
     * Get the relation with key is name of CPT.
     *
     * @return array
     */
    private function _getRelations()
    {
        $relationships = array_map(function ($class) {
            $obj = new $class();

            return [$obj->getCustomPostType() => $class];
        }, $this->relationships);

        return array_reduce($relationships, 'array_merge', []);
    }

    /**
     * Get value of general data.
     *
     * @param int
     */
    private function _getGeneralData($name, $post)
    {
        switch ($name) {
            case 'ID':
                return $post->ID;
                break;
            case 'title':
                return get_the_title($post->ID);
                break;
            case 'permalink':
                return get_permalink($post->ID);
                break;
            case 'slug':
                return $post->post_name;
                break;
            case 'published':
                return [
                    'full' => $post->post_date,
                    'date' => get_the_date(get_option('date_format'), $post->ID),
                    'time' => get_the_date(get_option('time_format'), $post->ID),
                ];
                break;
            case 'updated':
                return [
                    'full' => $post->post_modified,
                    'date' => get_the_modified_date(get_option('date_format'), $post->ID),
                    'time' => get_the_modified_date(get_option('time_format'), $post->ID),
                ];
                break;
        }

        return '';
    }
}
