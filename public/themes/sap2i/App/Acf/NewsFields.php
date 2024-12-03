<?php

/*
 * Specific fields for
 * NEWS
 * ---------------------.
 */

namespace App\Acf;

use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Wysiwyg;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\DateTimePicker;

class NewsFields
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        register_extended_field_group([
            'title' => 'Champs de l\'actualité',
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
            Text::make('Titre de l\'actualité', 'news_title')
                ->instructions('Saisir un titre pour l\'actualité'),
            Text::make('Courte description', 'news_desc')
                ->instructions('Saisir une courte description : Maximum 60 caractères. (Si non remplie, on affichera la première phrase du contenu.)')
                ->characterLimit(60),
            Wysiwyg::make('Contenu de l\'actualité', 'content_desc_actu')
                ->mediaUpload(false)
                ->tabs('visual')
                ->toolbar('simple')
                ->required(),
            Image::make('Image de l\'actualité', 'img_actu')
                ->mimeTypes(['jpg', 'jpeg', 'png'])
                ->library('all')
                ->returnFormat('array')
                ->previewSize('medium')
                ->required(),
            DateTimePicker::make('Fin de publication', 'end_date')
                ->instructions('Saisir la date de fin de publication de l\'actualité')
                ->displayFormat('d/m/Y H:i:s')
                ->returnFormat('Y-m-d H:i:s')
                ->required(),
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
            Location::if('post_type', '==', 'news'),
        ];
    }
}


new NewsFields();

