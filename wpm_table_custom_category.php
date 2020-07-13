<?php

function wpm_table_category_hierarchical_taxonomy(){

    $labels = array(
        'name' => __('Table Categories', 'wp-menu'),
        'singular_name' => __('Table Category', 'wp-menu'),
        'search_items' => __('Search Table Category', 'wp-menu'),
        'all_items' => __('All Table Categories', 'wp-menu'),
        'parent_item' => __('Parent Table Category', 'wp-menu'),
        'parent_item_colon' => __('Parent Table Category', 'wp-menu'),
        'edit_item' => __('Edit Table Category', 'wp-menu'),
        'update_item' => __('Update Table Category', 'wp-menu'),
        'add_new_item' => __('Add New Table Category', 'wp-menu'),
        'new_item_name' => __('New Table Category Name', 'wp-menu'),
        'menu_name' => __('Table Categories', 'wp-menu'),
        'orderby' => 'count'
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'table_category' ),
    );

    register_taxonomy( 'table_category', array('table'), $args );

}

add_action( 'init', 'wpm_table_category_hierarchical_taxonomy' );