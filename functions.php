<?php

$mpm_prefix = 'wpm_';
$mpm_plugin_name = 'Wp Menu';

// retreiving our plugin settings from the options table
$wpm_settings = get_option('wpm_settings');

load_plugin_textdomain('wp-menu', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );

include(plugin_dir_path( dirname( __FILE__ ) ).'wp-menu/wpm_custom_metabox.php');
include(plugin_dir_path( dirname( __FILE__ ) ).'wp-menu/wpm_veg_nonveg.php');
include(plugin_dir_path( dirname( __FILE__ ) ).'wp-menu/wpm_custom_menu_post.php');
include(plugin_dir_path( dirname( __FILE__ ) ).'wp-menu/wpm_item_custom_category.php');

function wpm_custom_table(){ 
    
    global $wpdb;
    $table_name = $wpdb->prefix.'itemmeta';
    if( $wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name){
        $sql = "CREATE TABLE  $table_name (
            meta_id INTEGER (10) UNSIGNED AUTO_INCREMENT,
            item_id bigint(20) NOT NULL DEFAULT '0',
            meta_key varchar(255) DEFAULT NULL,
            meta_value longtext,
            PRIMARY KEY  (meta_id),
            KEY item_id (item_id),
            KEY meta_key(meta_key)
        )";

    require_once(ABSPATH.'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    }
}

/**************************************************
    * registering the custom table
***************************************************/

add_action('after_switch_theme', 'wpm_custom_table');

function wpm_item_register_custom_table() {

    global $wpdb;

    $wpdb->itemmeta = $wpdb->prefix . 'itemmeta';
    $wpdb->tables[] = 'itemmeta';
    
    return;
}

add_action( 'init', 'wpm_item_register_custom_table' );
add_action( 'switch_blog', 'wpm_item_register_custom_table' );