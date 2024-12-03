<?php

namespace App\Models;

class News extends General
{
    /**
     * Define the name of custom post type used.
     *
     * @var string
     */
    protected $customPostType = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ID', 'title', 'published', 'permalink', 'banner', 'news_desc','news_title','content_desc_actu','img_actu','end_date'];

    /**
     * Define all relations with the model.
     *
     * @var array
     */
    protected $relationships = [];
}
