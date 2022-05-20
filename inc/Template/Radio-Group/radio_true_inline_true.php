<?php
/**
 * Main: radio subtype = radio and required true inline true
 */


$html .= '<div class="row">';

if($description == true ){
    
    $html .= '<div class="controls">';
    $html .= '<div class="tooltip"><label class="radio-inline" for="fname">' . $label ."*". '</label>
        <span class="tooltiptext">'.$description.'</span>';
    

    // $html .= '<label for="fname">' . $label . '</label>';
    $html .= '</div>';
    $html .= '</div>';
}else{
    $html .= '<div class="controls">';
    $html .= '<label class="radio-inline" for="fname">' . $label ."*". '</label>';
    $html .= '</div>';
}

/*input type  Label*/
$html .= '<div class="controls">';
foreach ($values['values'] as $rd) {

    // $html .= '<input type="radio" id="qbf_radio_group" name="fav_language" value="' . $rd['value'] . '">';
    // $html .= '<label for="' . $rd['value'] . '">' . $rd['label'] . '</label><br>';
    
    $html .= '<input type="radio" id="qbf_radio_group" name="qbf_radio_group[]" value="' . $rd['value'] . '">';
    $html .= '<label for="qbf_radio_group">' . $rd['label'] . '</label><br>';
}

$html .= '</div>';