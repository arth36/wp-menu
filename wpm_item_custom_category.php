<?php

function wpm_category_hierarchical_taxonomy(){

    $labels = array(
        'name' => __('Item Categories', 'wp-menu'),
        'singular_name' => __('Item Category', 'wp-menu'),
        'search_items' => __('Search Item Category', 'wp-menu'),
        'all_items' => __('All Item Categories', 'wp-menu'),
        'parent_item' => __('Parent Item Category', 'wp-menu'),
        'parent_item_colon' => __('Parent Item Category', 'wp-menu'),
        'edit_item' => __('Edit Item Category', 'wp-menu'),
        'update_item' => __('Update Item Category', 'wp-menu'),
        'add_new_item' => __('Add New Item Category', 'wp-menu'),
        'new_item_name' => __('New Item Category Name', 'wp-menu'),
        'menu_name' => __('Item Categories', 'wp-menu'),
        'orderby' => 'count'
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'item_category' ),
    );

    register_taxonomy( 'item_category', array('item'), $args );

}

add_action( 'init', 'wpm_category_hierarchical_taxonomy' );