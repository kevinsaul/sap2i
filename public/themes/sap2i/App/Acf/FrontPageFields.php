<?php

/*
 * Specific fields for
 * Front Page
 * ---------------------.
 */

namespace App\Acf;

use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Wysiwyg;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\PostObject;

class FrontPageFields
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        register_extended_field_group([
            'title' => 'Champs de la page d\'accueil',
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
            Text::make('Titre du slider', 'title_slide')
                ->instructions('Saisir le titre de la slider')
                ->required(),
            Repeater::make('Slider Page d\'accueil', 'home_slider')
                ->instructions('Ajouter les images du slider')
                ->fields([
                    Text::make('Titre de la slide', 'title_slide')
                        ->instructions('Saisir le titre de la slider')
                        ->required(),
                    Image::make('Image', 'image')
                        ->instructions('Saisir l\'image à afficher sur le slider / Dimensions minimales : 1700*750')
                        ->mimeTypes(['jpg', 'jpeg', 'png'])
                        ->height(750, 1080)
                        ->width(1700, 2500)
                        ->returnFormat('array')
                        ->required(),
                ])
                ->min(1)
                ->buttonLabel('Ajouter un élément')
                ->layout('block')
                ->required(),
            Group::make('Section | Qui Sommes-Nous', 'qui_sommes_nous')
                ->fields([
                    Text::make('Titre du bloc', 'title')
                        ->instructions('Saisir le titre du bloc')
                        ->required(),
                    Wysiwyg::make('Contenu du bloc', 'bloc')
                        ->instructions('Saisir le contenu textuel de cette section')
                        ->mediaUpload(false)
                        ->tabs('visual')
                        ->toolbar('simple')
                        ->required(),
                    Image::make('Image de droite', 'img_top_left')
                        ->instructions('Saisir l\'image pour cette section | Largeur minimale: 350px / Hauteur minimale: 350px')
                        ->mimeTypes(['jpg', 'jpeg', 'png'])
                        ->height(350, 1000)
                        ->width(350, 1200)
                        ->returnFormat('array')
                        ->required(),
                    Image::make('Image de droite', 'img_top_right')
                        ->instructions('Saisir l\'image pour cette section | Largeur minimale: 350px / Hauteur minimale: 350px')
                        ->mimeTypes(['jpg', 'jpeg', 'png'])
                        ->height(350, 1000)
                        ->width(350, 1200)
                        ->returnFormat('array')
                        ->required(),
                    Image::make('Image de droite', 'img_bottom_left')
                        ->instructions('Saisir l\'image pour cette section | Largeur minimale: 350px / Hauteur minimale: 350px')
                        ->mimeTypes(['jpg', 'jpeg', 'png'])
                        ->height(350, 1000)
                        ->width(350, 1200)
                        ->returnFormat('array')
                        ->required(),
                    Image::make('Image de droite', 'img_bottom_right')
                        ->instructions('Saisir l\'image pour cette section | Largeur minimale: 350px / Hauteur minimale: 350px')
                        ->mimeTypes(['jpg', 'jpeg', 'png'])
                        ->height(350, 1000)
                        ->width(350, 1200)
                        ->returnFormat('array')
                        ->required(),
                        
                ]),
            PostObject::make('Section | Nos certifications', 'nos_certifications')
                ->instructions('Sélectionner les certificats ou agréments à mettre en avant sur la page Accueil')
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
            Location::if('page_type', '=', 'front_page'),
        ];
    }
}

class ACF_Page_Type_Polylang
{
    // Whether we hooked page_on_front
    private $filtered = false;

    public function __construct()
    {
        add_filter('acf/location/rule_match/page_type', array($this, 'hook_page_on_front'));
    }

    public function hook_page_on_front($match)
    {
        // Abort if polylang not activated
        if (!function_exists('pll_get_post')) {
            return $match;
        }

        // Get the main language front page
        $front_page = (int) get_option('page_on_front');

        // Get the translated page of the curent language
        $translated_page = pll_get_post($front_page);

        // Check if it's the same as the current page and set match to true if so
        if ($translated_page === get_the_id()) {
            $match = true;
        }

        return $match;
    }
}

new FrontPageFields();

new ACF_Page_Type_Polylang();
