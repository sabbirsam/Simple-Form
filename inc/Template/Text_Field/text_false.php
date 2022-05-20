<?php
/**
 * Main: text  Subtype = text and required = false
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

    $html .= '<div class="' . $className . '">';
    // $html .= ' <input type="' . $values['type'] . '" id="qbf_text_input_field" name="' .$name . '" placeholder="' . $placeholder . '" >';
    $html .= ' <input type="' . $values['type'] . '" id="qbf_text_input_field_false" name="qbf_text_input_field[]" placeholder="' . $placeholder . '" >';
    $html .= '</div>';

    $html .= '</div>';