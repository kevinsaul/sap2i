<?php

/*
 * Specific fields for
 * Page générale
 * ---------------------.
 */

namespace App\Acf;

use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\Image;

class PageFields
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        register_extended_field_group([
            'title' => 'Champs spécifiques à cette page',
            'fields' => $this->fields(),
            'location' => $this->location(),
            'style' => 'default',
            'hide_on_screen' => array(
                0 => 'the_content',
                1 => 'featured_image',
                2 => 'revisions',
                3 => 'comments',
            ),
        ]);
    }

    /**
     * Return fields to create.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Image::make('Bannière image', 'banner')
                ->instructions('Ajouter l\'image bannière de cette page, qui apparaîtra tout en haut en fond | Dimensions minimales : 1500*500')
                ->mimeTypes(['jpg', 'jpeg', 'png'])
                ->height(500, 1080)
                ->width(1500, 3000)
                ->returnFormat('array'),
        ];
    }

    /**
     * Return fields location.
     *
     * @return array
     */
    public function location()
    {
        return [
            Location::if('post_type', '=', 'page')
                ->and('page', '!=', get_option('page_on_front')),
        ];
    }
}


new PageFields();

