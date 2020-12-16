<?php 
/**
 * Plugin Name: QK Register Post Type
 * Description: This plugin register all post type come with theme.
 * Version: 1.0
 * Author: Quannt
 * Author URI: http://qkthemes.com
 */
?>
<?php


//Portfolio

add_action( 'init', 'codex_portfolio_init' );
/**
 * Register a portfolio post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_portfolio_init() {
	
	
	$labels = array(
		'name'               => __( 'Portfolios', 'post type general name', 'element' ),
		'singular_name'      => __( 'Portfolio', 'post type singular name', 'element' ),
		'menu_name'          => __( 'Portfolios', 'admin menu', 'element' ),
		'name_admin_bar'     => __( 'Portfolio', 'add new on admin bar', 'element' ),
		'add_new'            => __( 'Add New', 'portfolio', 'element' ),
		'add_new_item'       => __( 'Add New Portfolio', 'element' ),
		'new_item'           => __( 'New Portfolio', 'element' ),
		'edit_item'          => __( 'Edit Portfolio', 'element' ),
		'view_item'          => __( 'View Portfolio', 'element' ),
		'all_items'          => __( 'All Portfolios', 'element' ),
		'search_items'       => __( 'Search Portfolios', 'element' ),
		'parent_item_colon'  => __( 'Parent Portfolios:', 'element' ),
		'not_found'          => __( 'No portfolios found.', 'element' ),
		'not_found_in_trash' => __( 'No portfolios found in Trash.', 'element' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'menu_icon' 		 => 'dashicons-portfolio',
		'publicly_queryable' => true,
		'menu_position' 	 => 2,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail','excerpt')
	);

	register_post_type( 'portfolio', $args );
}

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_portfolio_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_portfolio_taxonomies() {
	
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => __( 'Portfolio Categories', 'element' ),
		'singular_name'     => __( 'Portfolio Category', 'element' ),
		'search_items'      => __( 'Search Portfolio Categories','element' ),
		'all_items'         => __( 'All Portfolio Categories','element' ),
		'parent_item'       => __( 'Parent Portfolio Category','element' ),
		'parent_item_colon' => __( 'Parent Portfolio Category:','element' ),
		'edit_item'         => __( 'Edit Portfolio Category','element' ),
		'update_item'       => __( 'Update Portfolio Category','element' ),
		'add_new_item'      => __( 'Add New Portfolio Category','element' ),
		'new_item_name'     => __( 'New Portfolio Category Name','element' ),
		'menu_name'         => __( 'Portfolio Category' ,'element'),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'portfolio_category' ),
	);

	register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );


}

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_portfolio_tag', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_portfolio_tag() {
	
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => __( 'Portfolio Tags Filter', 'qktheme' ),
		'singular_name'     => __( 'Portfolio Tag', 'qktheme' ),
		'search_items'      => __( 'Search Portfolio Tags','qktheme' ),
		'all_items'         => __( 'All Portfolio Tags','qktheme' ),
		'parent_item'       => __( 'Parent Portfolio Tag','qktheme' ),
		'parent_item_colon' => __( 'Parent Portfolio Tag:','qktheme' ),
		'edit_item'         => __( 'Edit Portfolio Tag','qktheme' ),
		'update_item'       => __( 'Update Portfolio Tag','qktheme' ),
		'add_new_item'      => __( 'Add New Portfolio Tag','qktheme' ),
		'new_item_name'     => __( 'New Portfolio Tag Name','qktheme' ),
		'menu_name'         => __( 'Portfolio Tag' ,'qktheme'),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'portfolio_tag' ),
	);

	register_taxonomy( 'portfolio_tag', array( 'portfolio' ), $args );


}
require_once plugin_dir_path( __FILE__ ) . 'popular-widget.php';
?>