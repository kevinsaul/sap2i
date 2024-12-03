<?php

namespace App\Controllers;

/**
 * Template site map controller.
 */
class TplSitemap extends Page
{
    /**
     * Define post type to display on sitemap
     * If this is hierarchical = true.
     *
     * @var array
     */
    private $postTypes = ['page'];

    /**
     * Force to display all post types.
     *
     * @var bool
     */
    private $forceHierarchical = false;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Return the site map.
     *
     * @return array
     */
    public function sitemap()
    {
        return array_reduce($this->postTypes, function ($acc, $cpt) {
            $postTypeObj = get_post_type_object($cpt);
            if ($this->forceHierarchical) {
                $postTypeObj->hierarchical = true;
            }

            return array_merge($acc, [
                wp_list_pages(array(
                    'post_type' => $cpt,
                    'echo' => false,
                    'title_li' => '<h2>'.$postTypeObj->label.'</h2>',
                    'depth' => 0
                )),
            ]);
        }, []);
    }
}
