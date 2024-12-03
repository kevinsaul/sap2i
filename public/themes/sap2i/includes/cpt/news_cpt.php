<?php

add_action('init', function () {
    $slug = 'news';
    $slug_fr = 'news';
    $plural = 'actualités';
    $singular = 'actualité';
    $singular_link = 'l\'';
    $singular_link2 = 'd\'';
    $plural_link = 'les';
    $plural_link2 = 'des';

    register_extended_post_type($slug, [
        'show_in_feed' => true,
        'archive' => [
            'nopaging' => true,
        ],
        'menu_icon' => 'dashicons-megaphone',
        'labels' => [
            'name' => _x(ucfirst($plural), 'Post Type General Name', 'text_domain'),
            'singular_name' => _x(ucfirst($singular), 'Post Type Singular Name', 'text_domain'),
            'menu_name' => __(ucfirst($plural), 'text_domain'),
            'name_admin_bar' => __(ucfirst($plural), 'text_domain'),
            'archives' => __("Archives {$plural_link2} {$plural}", 'text_domain'),
            'attributes' => __("Attributs {$plural_link2} {$plural}", 'text_domain'),
            'parent_item_colon' => __('Parent Item:', 'text_domain'),
            'all_items' => __("Toutes {$plural_link} {$plural}", 'text_domain'),
            'add_new_item' => __("Ajouter une {$singular}", 'text_domain'),
            'add_new' => __('Ajouter', 'text_domain'),
            'new_item' => __("Nouvelle {$singular}", 'text_domain'),
            'edit_item' => __("Éditer {$singular_link} {$singular}", 'text_domain'),
            'update_item' => __("Mettre à jour {$singular_link} {$singular}", 'text_domain'),
            'view_item' => __("Voir {$singular_link} {$singular}", 'text_domain'),
            'view_items' => __("Voir {$plural_link} {$plural}", 'text_domain'),
            'search_items' => __("Rechercher dans {$plural_link} {$plural}", 'text_domain'),
            'not_found' => __("Pas {$singular_link2} {$singular}", 'text_domain'),
            'not_found_in_trash' => __("Pas {$singular_link2} {$singular} dans la poubelle", 'text_domain'),
            'featured_image' => __('Image mise en avant', 'text_domain'),
            'set_featured_image' => __("Définir l'image mise en avant", 'text_domain'),
            'remove_featured_image' => __("Supprimer l'image mise en avant", 'text_domain'),
            'use_featured_image' => __('Définir comme image mise en avant', 'text_domain'),
            'insert_into_item' => __("Ajouter à {$singular_link} {$singular}", 'text_domain'),
            'uploaded_to_this_item' => __("Téléchargé à cette {$singular}", 'text_domain'),
            'items_list' => __("Liste {$plural_link2} {$plural}", 'text_domain'),
            'items_list_navigation' => __("Naviguer dans {$plural_link} {$plural}", 'text_domain'),
            'filter_items_list' => __("Filtrer {$plural_link} {$plural}", 'text_domain'),
        ],
    ], [
        'slug' => $slug_fr,
    ]);
});
