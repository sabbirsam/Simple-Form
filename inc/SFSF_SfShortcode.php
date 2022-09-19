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
            $html .= '<form method="POST" enctype="multipart/form-data" id="qbfSearch">';
            $html .= '<div style="display: none;" id="render_data_Id" name="render_data_Id">'.$arr_values.'</div>';
            $html .= '<div id="simple_form_render"></div">';
            $html .= '</form">';
            return $html;
            
        }

    }
    

}