<?php
/**
 * Main: text subtype = text and required true
 */

$html .= '<div class="row">';

if($description == true ){
    
    $html .= '<div class="' . $className . '">';

    $html .= '<div class="tooltip"><label for="fname">' . $label ."*". '</label>
        <span class="tooltiptext">'.$description.'</span>';
    $html .= '</div>';

    // $html .= '<label for="fname">' . $label . '</label>';
    $html .= '</div>';
}else{
    $html .= '<div class="' . $className . '">';
    $html .= '<label for="fname">' . $label ."*". '</label>';
    $html .= '</div>';
}

/*input type  Label*/

$html .= '<div class="' . $className . '">';
                            $html .= ' <input type="' . $values['type'] . '"  id="qbf_num"  name="qbf_num[]" max="' . $max . '" min="' . $min . '" step="' . $step . '" placeholder="' . $placeholder . '" >';
                            $html .= '</div>';

                            $html .= '</div>';



                              // $html .= '<div class="' . $className . '">';
                            // $html .= ' <input type="' . $values['type'] . '"  id="qbf_num"  name="' .$name . '" max="' . $max . '" min="' . $min . '" step="' . $step . '" placeholder="' . $placeholder . '" >';
                            // $html .= '</div>';

                            // $html .= '</div>';