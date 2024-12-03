<?php

namespace App\Acf;

use WordPlate\Acf\Fields\Email;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Location;

class GeneralParametersFields
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        register_extended_field_group([
            'title' => 'Gestion des paramètres généraux',
            'fields' => $this->fields(),
            'location' => $this->location(),
            'hide_on_screen' => [
                0 => 'the_content',
                1 => 'featured_image',
                2 => 'revisions',
                3 => 'comments',
            ],
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
            Group::make('Informations globales', 'global_informations')
                ->fields([
                    Textarea::make('Adresse postale', 'adress')
                        ->instructions('Saisir l\'adresse postale')
                        ->newLines('br')
                        ->rows(3)
                        ->required(),
                    Email::make('Email', 'email')
                        ->instructions('Saisir l\'adresse email')
                        ->required(),
                    Text::make('Numéro de téléphone', 'phone')
                        ->instructions('Saisir le numéro de téléphone')
                        ->required(),
                ]),
            Group::make('Réseaux sociaux', 'social_networks')
                ->fields([
                    Text::make('Lien du compte Linkedin', 'linkedin_link')
                        ->instructions('Saisir l\'URL du compte Linkedin'),
            ]),
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
            Location::if('options_page', '=', 'acf-options-general-parameters'),
        ];
    }
}

new GeneralParametersFields();

if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Paramètres généraux',
        'menu_slug' => 'acf-options-general-parameters',
        'icon_url' => 'dashicons-admin-generic',
        'update_button' => __('Mettre à jour', 'acf'),
        'updated_message' => __('Paramètres mis à jour avec succès', 'acf'),
    ]);
}
