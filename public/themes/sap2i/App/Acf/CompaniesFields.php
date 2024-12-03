<?php

/*
 * Specific fields for
 * COMPANIES
 * ---------------------.
 */

namespace App\Acf;

use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Url;
use WordPlate\Acf\Fields\ButtonGroup;

class CompaniesFields
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        register_extended_field_group([
            'title' => 'Informations sur la société',
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
            ButtonGroup::make('Je suis ... ?', 'companies_role')
                ->instructions('Sélectionner le "rôle" de la société pour Sap2i')
                ->choices([
                    'certificat' => 'Un agrément ou certificat',
                    'partenaire' => 'Un partenaire',
                    'autre' => 'Autre',
                ])
                ->returnFormat('value')
                ->required(),
            Image::make('Logo', 'companies_logo')
                ->instructions('Renseigner le logo de le société | Largeur minimale: 200pixels  | Largeur maximale: 1000pixels')
                ->mimeTypes(['jpg', 'jpeg', 'png'])
                ->width(200, 1000)
                ->returnFormat('array')
                ->required(),
            Url::make('Lien vers le site internet', 'company_website_url')
                ->instructions('Ajouter le lien vers le site internet de la société si il y a.')
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
            Location::if('post_type', '==', 'companies'),
        ];
    }
}


new CompaniesFields();

