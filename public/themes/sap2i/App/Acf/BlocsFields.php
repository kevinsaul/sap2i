<?php

namespace App\Acf;

use WordPlate\Acf\Fields\FlexibleContent;
use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\Wysiwyg;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Select;
use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\TrueFalse;
use WordPlate\Acf\Fields\PostObject;
use WordPlate\Acf\Fields\Repeater;


class BlocsFields
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        register_extended_field_group([
            'title' => 'Gestion des blocs de la page',
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
            FlexibleContent::make('Blocs de la page', 'blocs')
                ->buttonLabel('Nouveau bloc')
                ->layouts([
                    Layout::make('Contenu simple', 'content_simple')
                        ->fields([
                            Wysiwyg::make('Contenu du bloc', 'content')
                                ->mediaUpload(false)
                                ->tabs('visual')
                                ->toolbar('simple')
                                ->required(),

                            Select::make('Couleur de fond du bloc', 'background_color')
                                ->choices([
                                    'blanc' => 'Blanc',
                                    'transparent' => 'Transparent (fond gris très clair)',
                                    'gris' => 'Gris foncé',
                                    'bleu' => 'Bleu foncé',
                                ])
                                ->defaultValue('blanc')
                                ->required(),
                        ]),

                    Layout::make('Contenu double', 'content_double')
                        ->fields([
                            Wysiwyg::make('Contenu simple à gauche', 'content_left')
                                ->mediaUpload(false)
                                ->tabs('visual')
                                ->toolbar('simple')
                                ->required(),

                            Wysiwyg::make('Contenu simple à droite', 'content_right')
                                ->mediaUpload(false)
                                ->tabs('visual')
                                ->toolbar('simple')
                                ->required(),

                            Select::make('Couleur de fond du bloc', 'background_color')
                                ->choices([
                                    'blanc' => 'Blanc',
                                    'transparent' => 'Transparent (fond gris très clair)',
                                    'gris' => 'Gris foncé',
                                    'bleu' => 'Bleu foncé',
                                ])
                                ->defaultValue('blanc')
                                ->required(),
                        ]),

                    Layout::make('Contenu à droite et image à gauche', 'content_img_left')
                        ->fields([
                            Image::make('Image à gauche', 'img_left')
                                ->instructions('Largeur min: 350pixels // Largeur max: 1500pixels')
                                ->mimeTypes(['jpg', 'jpeg', 'png'])
                                ->width(350, 1500)
                                ->library('all')
                                ->returnFormat('array')
                                ->previewSize('medium')
                                ->required(),

                            Wysiwyg::make('Contenu du bloc', 'content_right')
                                ->mediaUpload(false)
                                ->tabs('visual')
                                ->toolbar('simple')
                                ->required(),

                            Select::make('Couleur de fond du bloc', 'background_color')
                                ->choices([
                                    'blanc' => 'Blanc',
                                    'transparent' => 'Transparent (fond gris très clair)',
                                    'gris' => 'Gris foncé',
                                    'bleu' => 'Bleu foncé',
                                ])
                                ->defaultValue('blanc')
                                ->required(),
                        ]),

                    Layout::make('Contenu à gauche et image à droite', 'content_img_right')
                        ->fields([
                            Wysiwyg::make('Contenu du bloc', 'content_left')
                                ->mediaUpload(false)
                                ->tabs('visual')
                                ->toolbar('simple')
                                ->required(),

                            Image::make('Image à droite', 'img_right')
                                ->instructions('Largeur min: 500pixels // Largeur max: 1500pixels')
                                ->mimeTypes(['jpg', 'jpeg', 'png'])
                                ->width(350, 1500)
                                ->library('all')
                                ->returnFormat('array')
                                ->previewSize('medium')
                                ->required(),

                            Select::make('Couleur de fond du bloc', 'background_color')
                                ->choices([
                                    'blanc' => 'Blanc',
                                    'transparent' => 'Transparent (fond gris très clair)',
                                    'gris' => 'Gris foncé',
                                    'bleu' => 'Bleu foncé',
                                ])
                                ->defaultValue('blanc')
                                ->required(),
                        ]),
                    Layout::make('Banderole avec Titre + Logos', 'bloc_logos_liste')
                        ->fields([
                            Text::make('Titre du bloc', 'titre_bloc')
                                ->instructions('(Pour présenter les logos de cette section)'),
                            PostObject::make('Tous les logos', 'logos_selected')
                                ->instructions('Sélectionner les logos utilisés')
                                ->postTypes(['companies'])
                                ->allowNull()
                                ->allowMultiple(),
                        ]),
                    Layout::make('Banderole avec Titre + Logos classés en catégorie', 'bloc_logos_liste_categories')
                        ->fields([
                            Text::make('Titre du bloc', 'titre_bloc_categories')
                                ->instructions('(Pour présenter les logos de cette section)'),
                            Repeater::make('Ajouter une catégorie avec ses logos', 'categories')
                                ->instructions('')
                                ->fields([
                                    Text::make('Nom de la catégorie', 'nom_cat'),
                                    PostObject::make('Tous les logos', 'logos_selected_par_cat')
                                        ->instructions('Sélectionner les logos utilisés')
                                        ->postTypes(['companies'])
                                        ->allowNull()
                                        ->allowMultiple(true),
                                ])
                                ->min(2)
                                ->collapsed('name')
                                ->buttonLabel('Ajouter une catégorie')
                                ->layout('table') 
                                ->required(),
                        ]),
                    Layout::make('Affichage de tous les logos', 'bloc_logos_liste_all')
                        ->fields([
                            Text::make('Titre du bloc', 'titre_bloc_all')
                                ->instructions('(Pour présenter les logos de cette section)'),
                            PostObject::make('Tous les logos', 'logos_selected_all')
                                ->instructions('Sélectionner les logos utilisés')
                                ->postTypes(['companies'])
                                ->allowNull()
                                ->allowMultiple()
                        ]),
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
            Location::if('post_type', '=', 'page')
                    ->and('page', '!=', get_option('page_on_front'))
                    ->and('page_template', '!=', 'tpl-sitemap.php')
                    ->and('page_template', '!=', 'tpl-contact.php'),
            Location::if('post_type', '=', 'news'),
            Location::if('post_type', '=', 'companies')
        ];
    }
}

new BlocsFields();
