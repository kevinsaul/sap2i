<?php

namespace App\Acf;

use WordPlate\Acf\Fields\Taxonomy;
use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Wysiwyg;

class ArchivesNewsFields
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        register_extended_field_group([
            'title' => 'Gestion des informations de la page TOUTES NOS ACTUALITES',
            'fields' => $this->fields(),
            'location' => $this->location(),
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
            Wysiwyg::make('Phrase d\'accroche', 'accroche_news')
                ->instructions('Saisir une phrase d\'accroche pour la page')
                ->mediaUpload(false)
                ->tabs('visual')
                ->toolbar('simple'),
            Image::make('Image bannière', 'banner_news')
                ->instructions('Saisir l\'image à afficher comme bannière / Dimensions minimales : 1700*750')
                ->mimeTypes(['jpg', 'jpeg', 'png'])
                ->height(750, 1080)
                ->width(1700, 2500)
                ->returnFormat('array')
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
            Location::if('options_page', '=', 'acf-options-news-configuration'),
        ];
    }
}

new ArchivesNewsFields();

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Configuration de la page "Toutes nos actualités"',
        'menu_title' => 'Configuration',
        'menu_slug' => 'acf-options-news-configuration',
        'parent_slug' => 'edit.php?post_type=news',
        'update_button' => __('Mettre à jour', 'acf'),
        'updated_message' => __('Paramètres mis à jour avec succès', 'acf'),
    ));
}
