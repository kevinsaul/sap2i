<?php

namespace App\Controllers;

use App\Models\Page as PageModel;

/**
 * Controller of the standard page.
 */
class Page extends BaseController
{
    /**
     * Contain the data page.
     *
     * @var PageModel
     */
    protected $pageData;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->pageData = PageModel::find(get_post(), [
            'title',
            'blocs',
            'banner',
        ]);
    }

    /**
     * Get page data
     *
     * @return PageModel
     */
    public function page(): PageModel
    {
        return $this->pageData;
    }

    /**
     * Get the blocs page
     *
     * @return array
     */
    public function blocs()
    {
        return $this->pageData->blocs;
    }

}
