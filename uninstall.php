<?php

if(! defined('WP_UNINSTALL_PLUGIN')){
    die(); 
}
/**
 * Delete table If plugin uninstalled 
 */
global $wpdb;
$sfsf_form_table=$wpdb->prefix. 'simple_form_tables';
$sfsf_data_table=$wpdb->prefix. 'simple_form_tables_values';
$wpdb->query("DROP TABLE IF EXISTS {$sfsf_form_table} ");
$wpdb->query("DROP TABLE IF EXISTS {$sfsf_data_table} ");