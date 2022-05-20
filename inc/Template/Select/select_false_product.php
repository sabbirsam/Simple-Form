
<?php
/**
 * Main: select subtype = select and required = false  ALL PRODUCT
 */

$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 100000000,
);

$loop = new WP_Query( $args );


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

                            $html .= '<select id="qbf_select_product" name="qbf_select[]" >';

                            foreach ($values['values'] as $op) {

                                while ( $loop->have_posts() ) : $loop->the_post();
								global $product;
                                  
                                $html .= '<option value="' . $loop->post->ID . '">' . get_the_title() . '</option>';  
                                              
                                endwhile;
                                wp_reset_query();
                                 
                            }


                            $html .= '</select>';
                            $html .= '</div>';

?>


