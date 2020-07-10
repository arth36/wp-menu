<?php

function wpm_category_veg_nonveg(){

    $labels = array(
        'name' => __('Veg/Non-Vegs', 'wp-menu'),
        'singular_name' => __('Veg/Non-Veg', 'wp-menu'),
        'search_items' => __('Search Item Category', 'wp-menu'),
        'all_items' => __('All Item Categories', 'wp-menu'),
        'parent_item' => __('Parent Item Category', 'wp-menu'),
        'parent_item_colon' => __('Parent Item Category', 'wp-menu'),
        'edit_item' => __('Edit Veg/Non-Veg', 'wp-menu'),
        'update_item' => __('Update Veg/Non-Veg', 'wp-menu'),
        'add_new_item' => __('Add new Veg/Non-Veg', 'wp-menu'),
        'new_item_name' => __('Veg/Non-Veg', 'wp-menu'),
        'menu_name' => __('Veg-Non veg Categories', 'wp-menu'),
        'orderby' => 'count'
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'veg_nonveg' ),
    );

    register_taxonomy( 'veg_nonveg', array('item'), $args );

}

add_action( 'init', 'wpm_category_veg_nonveg' );