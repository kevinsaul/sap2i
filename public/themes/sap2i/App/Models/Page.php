<?php

namespace App\Models;

class Page extends General
{
    /**
     * Define the name of custom post type used.
     *
     * @var string
     */
    protected $customPostType = 'page';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ID', 'title', 'permalink'];

    /**
     * Define all relations with the model.
     *
     * @var array
     */
    protected $relationships = [
        Companies::class,
        News::class
    ];

    /**
     * Define bloc system
     *
     * @return array
     */
    protected function blocs($post, $blocs = null)
    {
        $result = [];
        $fields = $this->get_field(__FUNCTION__, $post);
        
        if (!empty($fields)) {
            foreach ($fields as $field) {
                if (method_exists($this, $field['acf_fc_layout'])) {
                    $func = $field['acf_fc_layout'];
                    $result[] = $this->$func($field);
                } else {
                    $result[] = $field;
                }
            }
        }
        return $result;
    }

    /**
     * recupere les sociétés/certificats sur la page d'accueil
     *
     * @return array
     */
    protected function nos_certifications($post)
    {
        $companies = $this->get_field(__FUNCTION__, $post);
        return $this->checkRelation($companies);
    }

    /**
     * recupere les logos classés par catégorie
     *
     * @return array
     */
    protected function bloc_logos_liste_categories($field)
    {
        if (!empty($field['categories'])) {
            foreach ($field['categories'] as $i => $category) {
                $logos = $this->checkRelation($category['logos_selected_par_cat']);
                $field['categories'][$i]['logos_selected_par_cat'] = $logos;
            }
        }
        return $field;
    }

    /**
     * recupere les logos
     *
     * @return array
     */
    protected function bloc_logos_liste($field)
    {
        $field['logos_selected'] = $this->checkRelation($field['logos_selected']);
        return $field;
    }

    /**
     * recupere les logos
     *
     * @return array
     */
    protected function bloc_logos_liste_all($field)
    {
        $field['logos_selected_all'] = $this->checkRelation($field['logos_selected_all']);
        $titles = array_map('ucfirst', array_column($field['logos_selected_all'], 'title'));
        array_multisort($titles, SORT_ASC, $field['logos_selected_all']);
        $field['logos_selected_all'] = array_chunk($field['logos_selected_all'], count($field['logos_selected_all']) / 4);
        return $field;
    }

    /**
     * Get all news
     *
     * @return array
     */
    protected function news($post)
    {
        $news = $this->get_field(__FUNCTION__, $post);
        return $this->checkRelation($news);
    }
}
