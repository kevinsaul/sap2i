<?php

/*
 * Specific fields for
 * sitemap template page
 * ---------------------.
 */

namespace App\Acf;

use WordPlate\Acf\Fields\Message;
use WordPlate\Acf\Location;

class SitemapFields
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        register_extended_field_group([
            'title' => 'Note relative au modèle de page plan du site',
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
            Message::make('Informations', 'message_sitemap')
                ->message('Le modèle de page <i>Plan du site</i> fonctionne de façon autonome, vous n\'avez donc pas besoin de remplir de champs texte.'),
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
            Location::if('page_template', '=', 'tpl-sitemap.php'),
        ];
    }
}

new SitemapFields();
