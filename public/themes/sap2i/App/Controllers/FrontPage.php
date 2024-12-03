<?php

namespace App\Controllers;

use App\Models\Page;
use App\Models\News;

/**
 * Controller of the home page.
 */
class FrontPage extends BaseController
{
    /**
     * Contain the data page.
     *
     * @var Page
     */
    protected $pageData;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->pageData = Page::find(get_post(), [
            'home_slider',
            'title_slide',
            'qui_sommes_nous',
            'nos_certifications'
        ]);
    }

    /**
     * Get page data
     *
     * @return PageModel
     */
    public function page(): Page
    {
        return $this->pageData;
    }

    /**
     * Get the blocs page
     *
     * @return array
     */
    public function slider()
    {
        return $this->pageData->blocs;
    }

    /**
     * Get last news before end date is greater than today
     */
    public function news()
    {
        $modelNews = new News();
        return $modelNews->all(1, 1, [
            'meta_query' => [
                [
                    'key' => 'end_date',
                    'compare' => '>=',
                    'value' => date('Y-m-d H:i:s'),
                    'type' => 'DATETIME',
                ],
            ]
        ])->first();
    }
}
