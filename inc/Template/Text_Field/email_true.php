<?php
/**
 * Main: text subtype = Email and required true
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
// $html .= ' <input type="' . $values['subtype'] . '" required="required" id="qbf_text_input_field_email" name="qbf_text_input_field_email[]" placeholder="' . $placeholder . '" >';
$html .= ' <input type="' . $values['subtype'] . '" required="required" id="qbf_field_email_true" name="qbf_field_email[]" placeholder="' . $placeholder . '" >';
$html .= '</div>';

$html .= '</div>';