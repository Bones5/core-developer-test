<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});


/**
 * Register Event Custom Post Type
 *
 * @return void
 */

add_action( 'init', function() {

	$labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'sage' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'sage' ),
		'menu_name'             => __( 'Events', 'sage' ),
		'name_admin_bar'        => __( 'Event', 'sage' ),
		'archives'              => __( 'Event Archives', 'sage' ),
		'attributes'            => __( 'Event Attributes', 'sage' ),
		'parent_item_colon'     => __( 'Parent Event:', 'sage' ),
		'all_items'             => __( 'All Events', 'sage' ),
		'add_new_item'          => __( 'Add New Event', 'sage' ),
		'add_new'               => __( 'Add New', 'sage' ),
		'new_item'              => __( 'New Event', 'sage' ),
		'edit_item'             => __( 'Edit Event', 'sage' ),
		'update_item'           => __( 'Update Event', 'sage' ),
		'view_item'             => __( 'View Event', 'sage' ),
		'view_items'            => __( 'View Events', 'sage' ),
		'search_items'          => __( 'Search Event', 'sage' ),
		'not_found'             => __( 'Not found', 'sage' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
		'featured_image'        => __( 'Featured Image', 'sage' ),
		'set_featured_image'    => __( 'Set featured image', 'sage' ),
		'remove_featured_image' => __( 'Remove featured image', 'sage' ),
		'use_featured_image'    => __( 'Use as featured image', 'sage' ),
		'insert_into_item'      => __( 'Insert into item', 'sage' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'sage' ),
		'items_list'            => __( 'Events list', 'sage' ),
		'items_list_navigation' => __( 'Events list navigation', 'sage' ),
		'filter_items_list'     => __( 'Filter items list', 'sage' ),
	);
	$args = array(
		'label'                 => __( 'Event', 'sage' ),
		'description'           => __( 'Events for this website', 'sage' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' , 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'event', $args );

}, 0 );

/**
 * Register Event Custom Taxonomy
 *
 * @return void
 */
add_action( 'init', function () {

	$labels = array(
		'name'                       => _x( 'Event Categories', 'Taxonomy General Name', 'sage' ),
		'singular_name'              => _x( 'Event Category', 'Taxonomy Singular Name', 'sage' ),
		'menu_name'                  => __( 'Category', 'sage' ),
		'all_items'                  => __( 'All Categories', 'sage' ),
		'parent_item'                => __( 'Parent Category', 'sage' ),
		'parent_item_colon'          => __( 'Parent Category:', 'sage' ),
		'new_item_name'              => __( 'New Category Name', 'sage' ),
		'add_new_item'               => __( 'Add New Category', 'sage' ),
		'edit_item'                  => __( 'Edit Category', 'sage' ),
		'update_item'                => __( 'Update Category', 'sage' ),
		'view_item'                  => __( 'View Category', 'sage' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'sage' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'sage' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
		'popular_items'              => __( 'Popular Categories', 'sage' ),
		'search_items'               => __( 'Search Categories', 'sage' ),
		'not_found'                  => __( 'Not Found', 'sage' ),
		'no_terms'                   => __( 'No items', 'sage' ),
		'items_list'                 => __( 'Categories list', 'sage' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'sage' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'event_category', array( 'event' ), $args );

}, 0 );
