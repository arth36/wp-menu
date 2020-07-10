<?php

function wpm_register_menu_custom_post_type() {
 
	$labels = array(
		'name'               => __('Items', 'wp-menu'),
		'singular_name'      => __('Item', 'wp-menu') ,
		'add_new'            => __('Add New', 'wp-menu'),
		'add_new_item'       => __('Add New Item', 'wp-menu'),
		'edit_item'          => __('Edit Item', 'wp-menu'),
		'new_item'           => __('New Item', 'wp-menu'),
		'all_items'          => __('All Items', 'wp-menu'),
		'view_item'          => __('View Item', 'wp-menu'),
		'search_items'       => __('Search Items', 'wp-menu'),
		'not_found'          =>  __('No items found','wp-menu'),
		'not_found_in_trash' => __('No tems found in Trash', 'wp-menu'),
		'parent_item_colon'  => __('', 'wp-menu'),
		'menu_name'          => __('Items', 'wp-menu'),
	);
 
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'item_category' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' ),
	);

/**************************************************
    * registering the custom book post type
***************************************************/
	register_post_type( 'item', $args );
 
}
add_action( 'init', 'wpm_register_menu_custom_post_type' );