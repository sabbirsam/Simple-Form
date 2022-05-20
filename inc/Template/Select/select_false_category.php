
<?php
/**
 * Main: select subtype = select and required = false
 */

$orderby = 'name';
$order = 'asc';
$hide_empty = false ;
$cat_args = array(
    'orderby'    => $orderby,
    'order'      => $order,
    'hide_empty' => $hide_empty,
);

$product_categories = get_terms( 'product_cat', $cat_args );	


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

                            $html .= '<select id="qbf_select_category" name="qbf_select[]" >';

                            foreach ($values['values'] as $op) {

                                if($op['value'] == 'product' && $op['selected'] == 'true'){

                                    foreach ($product_categories as $key => $category) {
                                        if( !empty($product_categories) ){
                                        $html .= '<option id="'.$op['value'].'" value="' . $category->slug . '">' . $category->name . '</option>';  
                                        }            
                                    
                                    }

                                }
                                
                                if($op['value'] == 'post' && $op['selected'] == 'true'){
                                    $categories = get_categories( array(
                                        'orderby' => 'name',
                                        'order'   => 'ASC'
                                        ) );
                                    
                                    foreach( $categories as $cat ) {
                                        
                                        $html .= '<option  value="' .get_category_link($cat->name) . '">' . $cat->name . '</option>';  
                                                 
                                    }

                                }
                                
                                if($op['value'] == 'select'){
                                    foreach ($product_categories as $key => $category) {
                                        if( !empty($product_categories) ){
                                        $html .= '<option id="'.$op['value'].'" value="' . $category->slug . '">' . $category->name . '</option>';  
                                        }            
                                    
                                    }
                                }

                                // foreach ($product_categories as $key => $category) {
                                //     if( !empty($product_categories) ){
                                //     $html .= '<option id="'.$op['value'].'" value="' . $category->slug . '">' . $category->name . '</option>';  
                                //     }            
                                
                                // }
                                
                            }


                            $html .= '</select>';
                            $html .= '</div>';

?>


