<?php

namespace App\Controllers;

use App\Models\Companies as CompaniesModel;

/**
 * Controller of the standard page.
 */
class SingleCompanies extends BaseController
{
    /**
     * Contain the data page.
     *
     * @var CompaniesModel
     */
    protected $companiesData;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->companiesData = CompaniesModel::find(get_post(), []);
    }

    /**
     * Get page data
     *
     * @return CompaniesModel
     */
    public function companies(): CompaniesModel
    {
        return $this->companiesData;
    }

}
