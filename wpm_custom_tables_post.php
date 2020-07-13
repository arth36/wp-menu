<?php

function wpm_register_table_custom_post_type() {
 
	$labels = array(
		'name'               => __('Tables', 'wp-menu'),
		'singular_name'      => __('Table', 'wp-menu') ,
		'add_new'            => __('Add New', 'wp-menu'),
		'add_new_item'       => __('Add New Table', 'wp-menu'),
		'edit_item'          => __('Edit Table', 'wp-menu'),
		'new_item'           => __('New Table', 'wp-menu'),
		'all_items'          => __('All Tables', 'wp-menu'),
		'view_item'          => __('View Table', 'wp-menu'),
		'search_items'       => __('Search Tables', 'wp-menu'),
		'not_found'          =>  __('No Tables found','wp-menu'),
		'not_found_in_trash' => __('No items found in Trash', 'wp-menu'),
		'parent_item_colon'  => __('', 'wp-menu'),
		'menu_name'          => __('Tables', 'wp-menu'),
	);
 
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'table_category' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' ),
	);

/**************************************************
    * registering the custom book post type
***************************************************/
	register_post_type( 'table', $args );
 
}
add_action( 'init', 'wpm_register_table_custom_post_type' );