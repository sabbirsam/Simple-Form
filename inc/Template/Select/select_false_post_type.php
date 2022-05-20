
<?php
/**
 * Main: select subtype = select and required = false POST TYPE
 */

$args = array(
    'public' => true,
);
$post_types = get_post_types( $args, 'objects' );


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

                            $html .= '<select id="qbf_select_post_type" name="qbf_select[]" >';

                            foreach ($values['values'] as $op) {

                                foreach ($post_types as $post_type_obj ) {
                                    $labels = get_post_type_labels( $post_type_obj );
                                    
                                    $html .= '<option value="' . $post_type_obj->name . '">' . $labels->name . '</option>';  
    
                                }                                
                            }

                            $html .= '</select>';
                            $html .= '</div>';

?>


