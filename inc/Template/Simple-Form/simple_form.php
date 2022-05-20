<?php
$wp_error = '';
    
wp_insert_post($user_data_arguments, $wp_error);

if (!$wp_error) {
    echo "Simple Form Data Added\n";
}

wp_reset_query();
