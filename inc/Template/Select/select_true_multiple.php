<?php
/**
 * Main: select subtype = select and required true
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

$html .= '<select id="qbf_select" name="qbf_select[]" multiple >';

foreach ($values['values'] as $op) {
    $html .= '<option value="' . $op['value'] . '">' . $op['label'] . '</option>';
}


$html .= '</select>';
$html .= '</div>';