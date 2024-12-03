<?php

namespace App\Controllers;

use App\Models\News;

/**
 * Archive Company controller.
 */
class ArchiveNews extends BaseController
{
    /**
     * Current post.
     *
     * @var WP_POST
     */
    private $currentPost;

    /**
     * Retrieve data of the news.
     *
     * @var Company
     */
    private $modelNews;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->currentPost = get_post();
        $this->modelNews = new News();
    }

    /**
     * Return all News.
     *
     * @return News
     */
    public function news()
    {
        return News::all()->get();
    }

    /**
     * Return toutes nos actus page infos.
     *
     * @return News
     */
    public function options()
    {
        return [
            'accroche' => get_field('accroche_news', 'options'),
            'banner' => get_field('banner_news', 'options')
        ];
    }
}
