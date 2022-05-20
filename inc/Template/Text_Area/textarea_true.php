<?php
/**
 * Main: text area subtype = textarea and required true
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

$html .= '<textarea id="qbf_text_area" name="qbf_text_area[]" cols="' . $maxlength . '" rows="' . $rows. '" placeholder="' . $placeholder . '"></textarea>';
$html .= '</div>';

$html .= '</div>';