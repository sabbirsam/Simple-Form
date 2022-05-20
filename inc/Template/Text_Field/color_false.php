<?php
/**
 * Main: text  Subtype = Email and required = false
 */
$html .= '<div class="row">';

                            //Tool tip 
                            //$html .= '<div class="tooltip">Hover over me
                            //     <span class="tooltiptext">'.$description.'</span>';
                            // $html .= '</div>';

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

                            $html .= '<div class="' . $className . '">';
                            $html .= ' <input type="' . $values['subtype'] . '" id="qbf_text_input_field_color_false" name="qbf_text_input_field[]" placeholder="' . $placeholder . '" >';
                            $html .= '</div>';

                            $html .= '</div>';