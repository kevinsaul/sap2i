<?php

namespace App\Models;

class Companies extends General
{
    /**
     * Define the name of custom post type used.
     *
     * @var string
     */
    protected $customPostType = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ID', 'title', 'published', 'permalink', 'banner', 'companies_logo', 'company_website_url'];

    /**
     * Define all relations with the model.
     *
     * @var array
     */
    protected $relationships = [];
}
