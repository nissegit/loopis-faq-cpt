<?php

/**
 * tags.php - creates and register a custom tag taxonomy (faq-tag) for the custom post types for the FAQ
 */

// No direct access

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'init', 'loopis_faq_create_tag_taxonomy' );

function loopis_faq_create_tag_taxonomy() {

    register_taxonomy('faq_tag', 'faq', [
        'label'             => 'FAQ-taggar',
        'public'            => true,
        'hierarchical'      => false, // false for "tags" (not hierarchical taxonomy type)
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite' => [
            'slug'       => 'faq-tag', // slug for the link: /faq-tag/tag (archive)
            'with_front' => false,
        ],
    ]);

}

?>