<?php

$reservation = new WP_Query(array(
    'post_type'=>'qbfuserdata',
    'post_status'=>'publish',
    'meta_query'=>array(
        array(
            'key'=>'email',
            'value'=>$email[0],
            'compare'=>'LIKE'
        ),

    )
));

if ($reservation->found_posts>0) {

echo 'Duplicate';
wp_reset_query();

} else {

$wp_error = '';

wp_insert_post($user_data_arguments, $wp_error);

if (!$wp_error) {
echo "Reservation Data Added\n";
}

wp_reset_query();

}
