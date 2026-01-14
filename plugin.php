<?php

/**
* Plugin Name: LOOPIS FAQ
* Plugin URI:  https://github.com/nissegit/loopis-faq-cpt
* Description: Plugin for handling FAQ custom post types & related taxonomies
* Version: 0.1
* Author: nissegit
* Text Domain: loopis-faq
*/

// No direct access

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Load custom hierarcical category taxonomy

require_once plugin_dir_path( __FILE__ ) . 'category.php';

// Function to add default terms at the right time (before register_activation_hook)
function loopis_faq_create_default_genres() {

    // Make sure taxonomy is registered before terms are created (not relying on add_action('init', ...))
    loopis_faq_create_category_taxonomy();

    // What terms that should be default in a new install
    $default_terms = [ 'Instruktioner', 'Medlemskap', 'LOOPIS.app', 'LOOPIS skåp', 'Om föreningen' ];

    // Add terms, as long as they don't already exists
    foreach ( $default_terms as $term ) {
        if (!term_exists($term, 'faq_category')) {
            wp_insert_term($term, 'faq_category');
        }
    }

	// Update permalink structure - but you might need to do it manually too:
	// Settings - Permalinks - Save changes
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'loopis_faq_create_default_genres');

// Load custom nonhierarchical tags taxonomy 

require_once plugin_dir_path( __FILE__ ) . 'tag.php';

// Create default tags - use auto-complete in post editor for suggestions

function loopis_faq_create_default_faq_tags() {

    // Function to add default tags at the right time (before register_activation_hook)
    loopis_faq_create_tag_taxonomy();

    $taxonomy = 'faq_tag';

    // Make sure that the taxonomy exists
    if ( ! taxonomy_exists( $taxonomy ) ) {
        return;
    }

    $default_tags = [ 'protips', 'guide', 'loopis', ];

    foreach ( $default_tags as $tag_name ) {

        // Skip if tag already exists
        if ( term_exists( $tag_name, $taxonomy ) ) {
            continue;
        }

        wp_insert_term(
            $tag_name,
            $taxonomy,
            [
                'slug' => $tag_name,
            ]
        );
    }
}

register_activation_hook(__FILE__, 'loopis_faq_create_default_faq_tags');

// Load custom post type functions

require_once plugin_dir_path( __FILE__ ) . 'post-type.php';

// Create a submenu link to the import information page
add_action('admin_menu', function() {
    add_submenu_page(
        'edit.php?post_type=faq',      // under CPT menu
        'FAQ Import Settings',         // page title
        'Import',                      // menu title
        'manage_options',              // capability
        'faq-import-settings',         // menu slug
        'loopis_faq_import_page'       // callback
    );
});

/** Import/Export FAQ custom posts XML 
 * WordPress importer needs to be installed from:
 * Tools - Import - WordPress Importer 
 * Files to import: FAQ posts from:
 * Tools - Export - Choose what to export - FAQs
 */

function loopis_faq_import_page() {
    ?>
    <div class="wrap">
        <h1>Importera/Exportera FAQ</h1>
		<p>För att exportera: <b>Tools - Export - Välj vad som ska exporteras: "FAQs" - Spara .xml-fil.</b>
		<p>För att importera: <b>Tools - Import - Ladda upp fil .xml-fil - Assign Author:</b></p> 
		<p>Välj vilken användare som ska vara författare: <b>(troligen admin)</b></p>
		<p>Kryssa i <b>"Import attachments" + "Change all imported URLs that currently link to the previous site so that they now link to this site"</b></p>
		<p><b>Submit</b></p>
		<p>Klart. Nu ska alla FAQ-posts dyka upp under FAQ-sektionen i wp-admin.</p>
		<br>
		<p>WordPress importer behöver vara installerad via:</p> 
		<p><b>Tools - Import - WordPress Importer</b></p>
	</div>			
<?php
}

// Clean up function for deactivation

function loopis_faq_cleanup() {

    // Careful: this will delete all FAQ posts, do not use/uncomment unless you have backup of the FAQ posts
    /*$faqs = get_posts([
        'post_type' => 'faq',
        'numberposts' => -1,
        'post_status' => 'any',
    ]);

    foreach ($faqs as $faq) {
        wp_delete_post($faq->ID, true); // permanent delete
    }*/
    
    //  Fetch and delete all categories in faq_kategori taxonomy - categories that are not included in the "default categories function" will be lost
    $categories = get_terms([
        'taxonomy'   => 'faq_category',
        'hide_empty' => false,
    ]);
    if (!is_wp_error($categories)) {
        foreach ($categories as $cat) {
            wp_delete_term($cat->term_id, 'faq_category');
        }
    }

    // Fetch and delete all tags in faq_tag taxonomy - tags that are not included in the "default tags function" will be lost
    $tags = get_terms([
        'taxonomy'   => 'faq_tag',
        'hide_empty' => false,
    ]);
    if (!is_wp_error($tags)) {
        foreach ($tags as $tag) {
            wp_delete_term($tag->term_id, 'faq_tag');
        }
    }
}

// Register the cleanup function

register_deactivation_hook(__FILE__, 'loopis_faq_cleanup');


?>