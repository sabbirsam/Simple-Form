<?php
/**
 * Main: radio subtype = radio and required = false inline true
 */


                

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

                            foreach ($values['values'] as $rd) {

                                $html .= '<input type="radio" id="qbf_radio_group" name="qbf_radio_group[]"  value="' . $rd['value'] . '">';
                                $html .= '<label for="' . $rd['value'] . '">' . $rd['label'] . '</label><br>';
                            }
            
                            $html .= '</div>';