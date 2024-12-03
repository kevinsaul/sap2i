<?php

/*
 * Specific fields for
 * Page générale
 * ---------------------.
 */

namespace App\Acf;

use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\PostObject;

class NosCompetencesFields
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        register_extended_field_group([
            'title' => 'Champs spécifiques',
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
            PostObject::make('Ajouter des logos pour la section NOS OUTILS', 'competences_nos_outils')
                ->postTypes(['companies'])
                ->allowNull()
                ->allowMultiple(),
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
            Location::if('page_template', '=', 'tpl-competences.php'),
        ];
    }
}


new NosCompetencesFields();

