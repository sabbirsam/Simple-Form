<?php

namespace SFSF\Inc;
use \SFSF\Inc\SFSF_BaseController;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

class SFSF_SfShortcode extends SFSF_BaseController {
    function __construct(){
        add_shortcode("simple_form", array($this, 'simple_form_shortcode'));
    }

    public function simple_form_shortcode($atts){
        
        $shortcodeID = isset($atts['id']) ? intval($atts['id']) : null;
        global $wpdb;
        $wpdb->hide_errors();
        $table=$wpdb->prefix. 'simple_form_tables';
        $resultss = $wpdb->get_results(
            "SELECT `id` from $table WHERE id =$shortcodeID"
        );
    
       
        foreach($resultss as $rows)
        {   }

        if(isset($rows->id)){
            $udatas= $rows->id;

            if ($udatas != $shortcodeID) {
                return 'ID parameter not match.';
            }
        
            if (!$shortcodeID) {
                return 'ID parameter not found.';
            }
            
            global $wpdb;
            $table_name = $wpdb->prefix . 'simple_form_tables';
            $results = $wpdb->get_results("SELECT `form_fields` FROM $table_name WHERE id = $shortcodeID" );
            
            $arr_values = $results[0]->form_fields;
            $form_data= json_decode($arr_values, true );
            $html = '';
            $html .= '<form method="POST" enctype="multipart/form-data" id="qbfSearch"> 
            <div class="qbf_d_table">';
            foreach ($form_data as $key => $arr_values) {
                foreach ($arr_values as $v_key => $values) {
                    $access = $values['access'] ?? null;
                    $className = $values['className'] ?? null;
                    $description = $values['description'] ?? null;
                    $inline = $values['inline'] ?? null;
                    $label = $values['label'] ?? null;
                    $max = $values['max'] ?? null;
                    $maxlength = $values['maxlength'] ?? null;
                    $min = $values['min'] ?? null;
                    $multiple = $values['multiple'] ?? null;
                    $name = $values['name'] ?? null;
                    $options = $values['options'] ?? null;
                    $other = $values['other'] ?? null;
                    $placeholder = $values['placeholder'] ?? null;
                    $required = $values['required'] ?? null;
                    $rows = $values['rows'] ?? null;
                    $step = $values['step'] ?? null;
                    $style = $values['style'] ?? null;
                    $subtype = $values['subtype'] ?? null;
                    $toggle = $values['toggle'] ?? null;
                    $value = $values['value'] ?? null;
                    $_text = $values['type'] ?? null;  
    
                    if ($_text == 'text') {
                        if ($subtype == 'text') {
                            if ($_text == 'text' &&  $required == 'false') {
                                include (dirname(__FILE__).'/Template/Text_Field/text_false.php');
                            } elseif ($_text == 'text' &&  $required == 'true') {
                                include (dirname(__FILE__).'/Template/Text_Field/text_true.php');
                            }
                        } elseif ($subtype == 'search') {
                            if ($subtype == 'search' &&  $required == 'false') {
        
                                include(dirname(__FILE__).'/Template/Text_Field/search_false.php'); //only search
        
                            } elseif ($subtype == 'search' &&  $required == 'true') {
                                include(dirname(__FILE__).'/Template/Text_Field/search_true.php'); //used for category and input
                            }
                        } 
                        elseif ($subtype == 'password') {
        
                            if ($subtype == 'password' &&  $required == 'false') {
                                include(dirname(__FILE__).'/Template/Text_Field/password_false.php');
                            } elseif ($subtype == 'password' &&  $required == 'true') {
                                include(dirname(__FILE__).'/Template/Text_Field/password_true.php');
                            }
                        } elseif ($subtype == 'email') {
        
                            if ($subtype == 'email' &&  $required == 'false') {
                                include(dirname(__FILE__).'/Template/Text_Field/email_false.php');
                            } elseif ($subtype == 'email' &&  $required == 'true') {
                                include(dirname(__FILE__).'/Template/Text_Field/email_true.php');
                            }
                        } elseif ($subtype == 'color') {
        
                            if ($subtype == 'color' &&  $required == 'false') {
                                include(dirname(__FILE__).'/Template/Text_Field/color_false.php');
                            } elseif ($subtype == 'color' &&  $required == 'true') {
                                include(dirname(__FILE__).'/Template/Text_Field/color_true.php');
                            }
                        }
                    }
                                
                            
                    /*textarea*/
                    if ($_text == 'textarea') {
                        if ($subtype == 'textarea') {
        
                            if ($subtype == 'textarea' &&  $required == 'false') {
                                include(dirname(__FILE__).'/Template/Text_Area/textarea_false.php');
                            } elseif ($subtype == 'textarea' &&  $required == 'true') {
                                include(dirname(__FILE__).'/Template/Text_Area/textarea_true.php');
                            }
                        }
                    }
                                
                                
                    /*select*/
        
                    if ($_text == 'select') {
                        $multiple = $values['multiple'] ?? null;
        
                        if ($_text == 'select' && $multiple == 'false') {
                            if ($_text == 'select' &&  $required == 'false') {
        
                            // named check here
                            if ($name == 'category') {  // Post Category
                                include(dirname(__FILE__).'/Template/Select/select_false_category.php');
                            } elseif ($name == 'post-type') {
                                include(dirname(__FILE__).'/Template/Select/select_false_post_type.php');
                            } elseif ($name == 'product') {
                                include(dirname(__FILE__).'/Template/Select/select_false_product.php');
                            } elseif ($name == 'keys') {
                                include(dirname(__FILE__).'/Template/Select/select_false_keys.php');
                            } elseif ($name == 'tag') {
                                include(dirname(__FILE__).'/Template/Select/select_false_tag.php');
                            } elseif ($name == 'attributes') {
                                include(dirname(__FILE__).'/Template/Select/select_false_attributes.php');
                            } else {
                                include(dirname(__FILE__).'/Template/Select/select_false.php');
                            }
                            } elseif ($_text == 'select' &&  $required == 'true') {
                                include(dirname(__FILE__).'/Template/Select/select_true.php');
                            }
                        } elseif ($_text == 'select' &&  $multiple == 'true') {
        
                            if ($_text == 'select' &&  $required == 'false') {
                                include(dirname(__FILE__).'/Template/Select/select_false_multiple.php');
                            } elseif ($_text == 'select' &&  $required == 'true') {
                                include(dirname(__FILE__).'/Template/Select/select_true_multiple.php');
                            }
                        }
                    }
        
                                
                    /*radio-group*/
                    // if ($_text == 'radio-group') {
        
                    //     if ($type == 'radio-group' && $inline == 'true') {
                    //         $other = $values['other'] ?? null;
                    //         if ($type == 'radio-group' &&  $required == 'false') {
                    //             include(dirname(__FILE__).'/Template/Radio-Group/radio_false_inline_true.php');
                    //         } elseif ($type == 'radio-group' &&  $required == 'true') {
                    //             include(dirname(__FILE__).'/Template/Radio-Group/radio_true_inline_true.php');
                    //         }
                    //     } elseif ($type == 'radio-group' && $inline == 'false') {
        
                    //         if ($type == 'radio-group' &&  $required == 'false') {
                    //             include(dirname(__FILE__).'/Template/Radio-Group/radio_false_inline_false.php');
                    //         } elseif ($type == 'radio-group' &&  $required == 'true') {
                    //             include(dirname(__FILE__).'/Template/Radio-Group/radio_true_inline_false.php');
                    //         }
                    //     }
                    // }
                                
                    /*paragraph*/
                    if ($_text == 'paragraph') {
                        $html .= '<div class="row">';
        
                        if ($values['subtype'] == 'blockquote') {
                            $html .= ' <blockquote> ' . $label . ' </blockquote>';
                        } elseif ($values['subtype'] == 'p') {
                            $html .= ' <p> ' . $label . ' </p>';
                        } elseif ($values['subtype'] == 'canvas') {
                            $html .= ' <canvas> ' . $label . ' </canvas >';
                        } elseif ($values['subtype'] == 'output') {
                            $html .= ' <output> ' . $label . ' </output>';
                        }
        
                        $html .= '</div>';
                    }
                                
                                
                    /*number*/
                    if ($_text == 'number') {
        
                        if ($_text == 'number' &&  $required == 'false') {
                            include(dirname(__FILE__).'/Template/Number/number_false.php');
                        } elseif ($_text == 'number' &&  $required == 'true') {
                            include(dirname(__FILE__).'/Template/Number/number_true.php');
                        }
                    }
                                
                    /*hidden*/
        
                    if ($_text == 'hidden') {
                        $html .= ' <input type="' . $values['type'] . '" id="qbf_hidden_num" name="' .$name . '" >';
                    }
        
        
                    /*Header button*/
                    if ($_text == 'header') {
        
                        $html .= '<div class="row">';
        
                        if ($values['subtype'] == 'h1') {
                            $html .= ' <h1 class=" '.$className. ' "> ' . $label . ' </h1>';
                        } elseif ($values['subtype'] == 'h2') {
                            $html .= ' <h2> ' . $label . ' </h2>';
                        } elseif ($values['subtype'] == 'h3') {
                            $html .= ' <h3> ' . $label . ' </h3 >';
                        } elseif ($values['subtype'] == 'h4') {
                            $html .= ' <h4> ' . $label . ' </h4>';
                        } elseif ($values['subtype'] == 'h5') {
                            $html .= ' <h5> ' . $label . ' </h5>';
                        } elseif ($values['subtype'] == 'h6') {
                            $html .= ' <h6> ' . $label . ' </h6>';
                        }
        
                        $html .= '</div>';
                    }
                                
                    /*File/Upload button*/
                    if ($_text == 'file') {
        
                        if ($multiple == 'true') {
                            $subtype = $values['subtype'] ?? null;
        
                            if ($subtype == 'file') {
                                if ($subtype == 'file' &&  $required == 'false') {
                                    include(dirname(__FILE__).'/Template/File_Upload_Button/multiple_file_upload_button_false.php');
                                } elseif ($subtype == 'file' &&  $required == 'true') {
                                    include(dirname(__FILE__).'/Template/File_Upload_Button/multiple_file_upload_button_true.php');
                                }
                            } elseif ($subtype == 'fineuploader') {
        
        
                                if ($subtype == 'fineuploader' &&  $required == 'false') {
                                    include(dirname(__FILE__).'/Template/File_Upload_Button/multiple_fineuploader_button_false.php');
                                } elseif ($subtype == 'fineuploader' &&  $required == 'true') {
                                    include(dirname(__FILE__).'/Template/File_Upload_Button/multiple_fineuploader_button_true.php');
                                }
                            }
                        } elseif ($multiple == 'false') {
        
                            if ($subtype == 'file') {
        
                                if ($subtype == 'file' &&  $required == 'false') {
                                    include(dirname(__FILE__).'/Template/File_Upload_Button/file_upload_button_false.php');
                                } elseif ($subtype == 'file' &&  $required == 'true') {
                                    include(dirname(__FILE__).'/Template/File_Upload_Button/file_upload_button_true.php');
                                }
                            } elseif ($subtype == 'fineuploader') {
        
                                if ($subtype == 'fineuploader' &&  $required == 'false') {
                                    include(dirname(__FILE__).'/Template/File_Upload_Button/fineuploader_button_false.php');
                                } elseif ($subtype == 'fineuploader' &&  $required == 'true') {
                                    include(dirname(__FILE__).'/Template/File_Upload_Button/fineuploader_button_true.php');
                                }
                            }
                        }
                    }
                                
                                
                    /*date button*/
                    if ($_text == 'date') {
        
                        if ($_text == 'date' &&  $required == 'false') {
                            include(dirname(__FILE__).'/Template/Date_Button/date_false.php');
                        } elseif ($_text == 'date' &&  $required == 'true') {
                            include(dirname(__FILE__).'/Template/Date_Button/date_true.php');
                        }
                    }
        
                    /*checkbox button*/
                    if ($_text == 'checkbox-group') {
                        $toggle = $values['toggle'] ?? null;
                                    
                        if ($_text == 'checkbox-group' && $toggle == 'true') {
                            $html .= '<div class="row">';
                                
                            $html .= ' <p> ' . $label . ' </p>';
                                
                            foreach ($values['values'] as $cb) {
                                $cb_name = $cb['name'] ?? null;
                                $cb_label = $cb['label'] ?? null;
                                
                                $html .= '<label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>';
                                $html .= '<label for="' .$cb_name . '">' . $cb_label . '</label><br>';
                            }
                                
                            $html .= '</div>';
                        } elseif ($_text == 'checkbox-group' && $toggle == 'false') {
                            $html .= '<div class="row">';
                            
                            $html .= ' <p> ' . $label . ' </p>';
                            
                            foreach ($values['values'] as $cb) {
                                $cb_name = $cb['name'] ?? null;
                                $cb_label = $cb['label'] ?? null;
                                $cb_value = $cb['value'] ?? null;
                            
                                // $html .= '<input type="checkbox" id="qbf_checkbox" name="' .$name . '" value="' .$cb_value . '" >';
                                $html .= '<input type="checkbox" id="qbf_checkbox" name="qbf_checkbox[]" value="' .$cb_value . '" >';
                                $html .= '<label for="' .$cb_name . '">' . $cb_label . '</label><br>';
                            }
                            
                            $html .= '</div>';
    
                            
                        }
                    }
    
                    /**
                     * global button 
                     */
    
                    if ($_text == 'button') {
                        if ($values['subtype'] == 'button') {
                            $html .= '<div class="row">';
                            // $html .= ' <button name="' . $name . '"  data-id="'.$shortcodeID.'" value="'.$value.'" type="button" class="' . $className . '" id="qbf-button">' . $label . '</button>';
                            $html .= ' <button name="submit" type="submit"  data-id="'.$shortcodeID.'" value="'.$value.'" class="qbf-submit" id="qbf-submit">' . $label . '</button>';
                            $html .= '</div>';
                        } elseif ($values['subtype'] == 'search') {
                            $html .= '<div class="row">';
                            // $html .= ' <button name="submit" data-modal-product-id="popup"  data-id="'.$shortcodeID.'" value="'.$value.'" type="submit" class="' . $className . '" id="qbf-search">' . $label . '</button>';
                            $html .= ' <button name="submit" type="submit"  data-id="'.$shortcodeID.'" value="'.$value.'" class="qbf-submit" id="qbf-submit">' . $label . '</button>';
                            $html .= '</div>';
                        } elseif ($values['subtype'] == 'submit') {
                            $html .= '<div class="row">';
                            // $html .= ' <button name="submit" type="submit"  data-id="'.$shortcodeID.'" value="'.$value.'" class="' . $className . '" id="qbf-submit">' . $label . '</button>';
                            $html .= ' <button name="submit" type="submit"  data-id="'.$shortcodeID.'" value="'.$value.'" class="qbf-submit" id="qbf-submit">' . $label . '</button>';
                            $html .= '</div>';
                        }
                    }
    
    
    
                /**
                 * Foreach End
                 */
                }
            }
            return $html;
            
        }
        // else{
        //     echo "Wring shortcode Id/n";
        // }

    }
    

}