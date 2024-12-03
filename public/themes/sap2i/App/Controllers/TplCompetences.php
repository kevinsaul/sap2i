<?php

namespace App\Controllers;

use App\Models\Page as PageModel;

/**
 * Template Nos Competences controller.
 */
class TplCompetences extends Page
{
    /**
     * Allow recovery data of the page.
     *
     * @var PageModel
     */
    protected $pageData;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->pageData = PageModel::find(get_post(), [
            'competences_nos_outils',
        ]);
    }
}
