<?php

if(! defined('WP_UNINSTALL_PLUGIN')){
    die(); 
}

// $base_uninstall = get_post( 
//     array(
//         'post_type'=> 'base',
//          'numberposts'=>-1,
//         ));

// foreach ($base_uninstall as $base_item) {
//     wp_delete_post($base_item->ID, true);
    
// }

global $wpdb;
$sfsf_form_table=$wpdb->prefix. 'simple_form_tables';
$sfsf_data_table=$wpdb->prefix. 'simple_form_tables_values';
$wpdb->query("DROP TABLE IF EXISTS {$sfsf_form_table} ");
$wpdb->query("DROP TABLE IF EXISTS {$sfsf_data_table} ");