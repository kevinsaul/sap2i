<?php

namespace App\Controllers;

use App\Models\Companies;

/**
 * Archive Company controller.
 */
class ArchiveCompanies extends BaseController
{
    /**
     * Current post.
     *
     * @var WP_POST
     */
    private $currentPost;

    /**
     * Retrieve data of the Companies.
     *
     * @var Company
     */
    private $modelCompany;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->currentPost = get_post();
        $this->modelCompany = new Companies();
    }

    /**
     * Return all Companies.
     *
     * @return Company
     */
    public function companies()
    {
        return Companies::all()->get();
    }

    /**
     * Return NOS PARTENAIRES page infos.
     *
     * @return Companies
     */
    public function options()
    {
        return [
            'accroche' => get_field('accroche_companies', 'options'),
            'banner' => get_field('banner_companies', 'options')
        ];
    }
}
