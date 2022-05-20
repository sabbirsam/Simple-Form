
<?php
/**
 * Main: select subtype = select and required = false ATTIBUTE
 */

$terms = get_terms( array(
    // 'taxonomy' => 'pa_color', // pa_size' or delete this line 
    'hide_empty' => true,
  ) );


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

                            $html .= '<select id="qbf_select_attributes" name="qbf_select[]"  >';

                            foreach ($values['values'] as $op) {

                                foreach ($terms as $term){
                                    
                                    $html .= '<option value="' . $term->slug . '">' . $term->name . '</option>';  
                                             
                                
                                }


                                
                            }


                            $html .= '</select>';
                            $html .= '</div>';

?>


