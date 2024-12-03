<?php

namespace App\Controllers;

use App\Models\News as NewsModel;

/**
 * Controller of the standard page.
 */
class SingleNews extends BaseController
{
    /**
     * Contain the data page.
     *
     * @var NewsModel
     */
    protected $newsData;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->newsData = NewsModel::find(get_post());
    }

    /**
     * Get page data
     *
     * @return NewsModel
     */
    public function news(): NewsModel
    {
        return $this->newsData;
    }
}
