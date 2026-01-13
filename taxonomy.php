<?php

/**
 * taxonomy.php - creates and register a custom taxonomiy for the custom post types for the FAQ
 */

// No direct access

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Function to register the taxonomy

function loopis_faq_faqs_register_taxonomy() {

    register_taxonomy( 'faq_kategorier', 'faq', [

        // Taxonomy arguments
        'public'            => true,
        'show_in_rest'      => true,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
        'show_admin_column' => true,
        'hierarchical'      => true,
        'query_var'         => 'faq-kategorier',

        // Rewrite handles the URL structure
        'rewrite'   => [
            'slug'          => 'faq-kategorier', // Get specific category t.ex. /faq-kategorier/instruktioner
            'with_front'    => true,
            'hierarchical'   => true,
            'ep_mask'       => EP_NONE
        ],

        // Text labels
        'labels'    => [
            'name'                  => 'Kategorier',
            'singular_name'         => 'Kategori',
            'menu_name'             => 'Kategorier',
            'name_admin_bar'        => 'Kategori',
            'search_items'          => 'Sök Kategorier',
            'popular_items'         => 'Populära Kategorier',
            'all_items'             => 'Alla Kategorier',
            'edit_item'             => 'Ändra Kategori',
            'view_item'             => 'Visa Kategori',
            'update_item'           => 'Uppdatera Kategori',
            'add_new_item'          => 'Lägg till ny Kategori',
            'new_item_name'         => 'Nytt Kategorinamn',
            'not_found'             => 'Inga kategorier funna.',
            'no_terms'              => 'Inga kategorier',
            'items_list_navigation' => 'Kategorilistnavigering',
            'items_list'            => 'Kategorilista',

        ]
    ]);

}

// Load taxonomies early before CPT
add_action( 'init', 'loopis_faq_faqs_register_taxonomy', 0 );

?>