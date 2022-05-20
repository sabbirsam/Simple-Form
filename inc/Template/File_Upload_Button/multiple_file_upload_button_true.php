<?php

/**
 * Main: fileupload subtype file  and required = true
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

$html .= ' <input type="file" id="qbf_myFile" name="qbf_myFile[]" multiple>';
$html .= '</div>';

$html .= '</div>';