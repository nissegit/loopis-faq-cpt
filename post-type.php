<?php

/**
 * post-type.php - creates and register custom post types for the FAQ
 */

// No direct access

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Name: loopis_faq faq_collection_cpt - cpt custom post types

function loopis_faq_create_faq_cpt() {

    register_post_type( 'faq', [
    
        // Post type arguments
        'public'                => true,
        'publicly_queryable'    => true,
        'show_in_rest'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'exclude_from_search'   => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-sticky',
        'hierarchical'           => true,
        'has_archive'           => 'faqs',
        'query_var'             => 'faqs',
        'map_meta_cap'          => true,
        'menu_position'         => 12,

        // Rewrite handles the URL structure
        'rewrite' => [
            'slug'          => 'faqs',
            'with_front'    => true,
            'pages'         => true,
            'feeds'         => true,
            'ep_mask'       => EP_PERMALINK,
        ],

        // Features the post type supports
        'supports' => [
            'title',
            'editor',
            'excerpt',
            'thumbnail',
        ],

        // Text labels
		'labels'              => [
			'name'                     => 'FAQs',
			'singular_name'            => 'FAQ',
			'add_new'                  => 'Lägg till ny',
			'add_new_item'             => 'Lägg till ny FAQ',
			'edit_item'                => 'Ändra FAQ',
			'new_item'                 => 'Ny FAQ',
			'view_item'                => 'Visa FAQ',
			'view_items'               => 'Visa FAQs',
			'search_items'             => 'Sök FAQs',
			'not_found'                => 'Inga FAQs funna.',
			'not_found_in_trash'       => 'Inga FAQs funna i skräpkorgen.',
			'all_items'                => 'Alla FAQs',
			'archives'                 => 'FAQ-arkiv',
			'attributes'               => 'FAQ-attribut',
			'insert_into_item'         => 'Sätt in i FAQ',
			'uploaded_to_this_item'    => 'Uppladdad till denna FAQ',
			'featured_image'           => 'FAQ-bild',
			'set_featured_image'       => 'Sätt FAQ-image',
			'remove_featured_image'    => 'Ta bort FAQ-bild',
			'use_featured_image'       => 'Använd som FAQ-bild',
			'filter_items_list'        => 'Filtrera FAQs-lista',
			'items_list_navigation'    => 'FAQs-listnavigering',
			'items_list'               => 'FAQs-lista',
			'item_published'           => 'FAQ publicerad.',
			'item_published_privately' => 'FAQ publicerad privat.',
			'item_reverted_to_draft'   => 'FAQ återställd till utkast.',
			'item_scheduled'           => 'FAQ schemalagd.',
			'item_updated'             => 'FAQ uppdaterad.',
        ]

        ]);

}

// Add the action

add_action( 'init', 'loopis_faq_create_faq_cpt' );

?>