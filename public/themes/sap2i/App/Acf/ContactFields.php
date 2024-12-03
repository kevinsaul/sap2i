<?php

/*
 * Specific fields for
 * contact template page
 * ---------------------.
 */

namespace App\Acf;

use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\Select;
use WordPlate\Acf\Fields\Wysiwyg;
use WordPlate\Acf\Fields\Image;

class ContactFields
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        register_extended_field_group([
            'title' => 'Page contact',
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

        add_filter('acf/load_field/name=contact', [$this, 'contactFieldChoices']);
    }

    /**
     * Return fields to create.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Select::make('Formulaire de contact', 'contact')
                ->instructions('Selectionner le formulaire à afficher sur la page')
                ->returnFormat('array')
                ->required(),
            Wysiwyg::make('Phrase d\'accroche', 'accroche_contact')
                ->instructions('Saisir une phrase d\'accroche pour introduire le formulaire de contact')
                ->mediaUpload(false)
                ->tabs('visual')
                ->toolbar('simple'),
            Image::make('Image bannière', 'banner_contact')
                ->instructions('Saisir l\'image à afficher comme bannière / Dimensions minimales : 1700*750')
                ->mimeTypes(['jpg', 'jpeg', 'png'])
                ->height(750, 1080)
                ->width(1700, 2500)
                ->returnFormat('array')
        ];
    }

    /**
     * Populate Contact Template Page with contact forms.
     */
    public function contactFieldChoices($field)
    {
        $field['choices'] = [];

        $forms = get_posts([
            'post_type' => 'wpcf7_contact_form',
            'numberposts' => -1,
        ]);

        if (!empty($forms)) {
            foreach ($forms as $form) {
                $field['choices'][$form->ID] = $form->post_title;
            }
        }

        return $field;
    }

    /**
     * Return fields location.
     *
     * @return array
     */
    public function location()
    {
        return [
            Location::if('page_template', '=', 'tpl-contact.php'),
        ];
    }
}

new ContactFields();
