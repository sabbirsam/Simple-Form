
<?php
/**
 * Main: select subtype = select and required = false  TAGS
 */

$terms = get_terms(array('taxonomy' => 'product_tag', 'hide_empty' => false));


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

                            $html .= '<select id="qbf_select_tags" name="qbf_select[]" >';

                            foreach ($values['values'] as $op) {

                                foreach ( $terms as $term ) { 
                                    
                                    $html .= '<option value="' . $term->slug . '">' . $term->name . '</option>';  
                                          
                                
                                }


                                
                            }


                            $html .= '</select>';
                            $html .= '</div>';

?>


