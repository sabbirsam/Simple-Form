
<?php
/**
 * Main: select subtype = select and required = false  KEYS
 */

$args = array(
    'post_type'      => 'product',
    // 'post_type'      => 'qbfuserdata',
    // 'post_type'      => 'qbfdragndrop',
    // 'post_type'      => 'post',

    'posts_per_page' => 1,
    
);


$loop = new WP_Query( $args );

while ( $loop->have_posts() ) { $loop->the_post();
    global $product;
    $myvals = get_post_meta($loop->post->ID);


$html .= '<div class="row">';

                            if($description == true ){
                                
                                $html .= '<div class="' . $className . '">';

                                $html .= '<div class="tooltip"><label for="fname">' . $label . '</label>
                                    <span class="tooltiptext">'.$description.'</span>';
                                $html .= '</div>';

                                // $html .= '<label for="fname">' . $label . '</label>';
                                $html .= '</div>';
                            }else{
                                $html .= '<div class="' . $className . '">';
                                $html .= '<label for="fname">' . $label . '</label>';
                                $html .= '</div>';
                            }

                        
                            /*input type  Label*/

                            $html .= '<select id="qbf_select_keys" name="qbf_select[]" >';

                            foreach ($values['values'] as $op) {

                                foreach($myvals as $key=>$val)
								{
                                    $html .= '<option value="' . $key . '">' . $key . ' : ' . $val[0] . '</option>';  
                                }
                            }

							wp_reset_query();

                                
                            }


                            $html .= '</select>';
                            $html .= '</div>';

?>


