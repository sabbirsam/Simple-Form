<?php

namespace SFSF\Inc\Ajax_Parts;
use \SFSF\Inc\SFSF_BaseController;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

class SFSF_MessageCreation {

    public function __construct() {
        /**
         * Demo tets
         */
        $this->sfsf_message_creation();
        /**
         * Form Create
         */
        $this->sfsf_simple_message_form_submission();
        /**
         * Form delete
         */
        $this->sfsf_simple_message_delete_form();
        /**
         * Form Submission
         */
        $this->SFSF_contact_form_submission();
        /**
         * Form EDIT
         */
        $this->sfsf_edit_data_id();
    }

    /**
     * delete
     */
    public function sfsf_message_creation() {

        if ($_POST['action'] == 'show_user_inputed_data') {

            $permission = check_ajax_referer('SFSF_delete_post_nonce', 'nonce', false);
    
            if ($permission) {
                $df_delete_data = sanitize_text_field ($_POST['df_delete_data']);
                global $wpdb;
                $table=$wpdb->prefix. 'simple_form_tables_values';
                $wpdb->delete( $table, array( 'id' => $df_delete_data ) );               
            }
            
            wp_die();
        }

    }

    /**
     * Form Create
     */
    public function sfsf_simple_message_form_submission() {

        if ($_POST['action'] == 'simple_message_form_submission') {

            /**
             * Sanitize function for array || object from the admin drag and drop data
             */
            function sanitize_text_or_array_field($array_or_string) {
                if( is_string($array_or_string) ){
                    $array_or_string = sanitize_text_field($array_or_string);
                }elseif( is_array($array_or_string) ){
                    foreach ( $array_or_string as $key => &$value ) {
                        if ( is_array( $value ) ) {
                            $value = sanitize_text_or_array_field($value);
                        }
                        else {
                            $value = sanitize_text_field( $value );
                        }
                    }
                } 
                return $array_or_string;
            }
            /**
             * Sanitize all drag drop data
             */
            $sanitizedData_result = sanitize_text_or_array_field($_POST['result']);
            $s_form_field = sanitize_text_field ($_POST['form_field']);
            $s_id = sanitize_text_field ($_POST['id']);
            $s_f_name = sanitize_text_field ($_POST['f_name']);
            $s_update_results = sanitize_text_or_array_field ($_POST['update_results']);
            

            $sanitizedData = isset( $sanitizedData_result ) ? $sanitizedData_result :'';
            $formData =  isset( $s_form_field) ? $s_form_field : '' ;
            $Data_ID = isset(  $s_id ) ?  $s_id :'';
            $Data_Name = isset($s_f_name)? $s_f_name:'';
            $Data_update_result = isset( $s_update_results )?  $s_update_results :'';
            
            if ($sanitizedData) {
   
                $jdata= json_encode($sanitizedData, true);
               
                
                $date = date('Y-m-d H:i:s');
                global $wpdb;
                $table=$wpdb->prefix. 'simple_form_tables';
                $data = array('form_name' => $formData, 'form_fields' => $jdata, 'time' => $date);
                $format = array('%s','%s');
                $wpdb->insert($table,$data,$format);
                $save = $wpdb->insert_id;
            }

            /**
             * Update edit
             */
            if ($Data_ID) {

                $S_Data_ID = sanitize_text_field ($_POST['id']);
                $S_Data_Name = sanitize_text_field ($_POST['f_name']);
                $S_Data_update_result = sanitize_text_or_array_field ($_POST['update_results']); // this need to add [] 
                $S_update_data = array($Data_update_result);


                $Data_ID = isset(  $S_Data_ID ) ?  $S_Data_ID :'';
                $Data_Name = isset( $S_Data_Name)?  $S_Data_Name:'';
                $Data_update_result = isset( $S_update_data )?  $S_update_data:'';


                $up_data= json_encode($Data_update_result, true);         
                
                $u_dates = date('Y-m-d H:i:s');
                global $wpdb;
                $table=$wpdb->prefix. 'simple_form_tables';
                $u_data = array('form_name' => $Data_Name, 'form_fields' => $up_data, 'time' => $u_dates);
                $condition = array('id'=>$Data_ID); 
                $wpdb->update($table,$u_data,$condition); 
                $save = $wpdb->insert_id;  
            }

            wp_die();
        }

    }

    /**
     * Form Delete
     */
    public function sfsf_simple_message_delete_form() {

        if ($_POST['action'] == 'simple_message_delete_form') {
           
            $permission = check_ajax_referer('SFSF_delete_post_nonce', 'nonce', false);
    
            if ($permission) {
                $df_delete_data = sanitize_text_field ($_POST['df_delete_data']);
                global $wpdb;
                $table=$wpdb->prefix. 'simple_form_tables';
                $wpdb->delete( $table, array( 'id' => $df_delete_data ) );               
            }
            wp_die();
        }

    }
     /**
     * Form EDIT
     */
    public function sfsf_edit_data_id() {

        if ($_POST['action'] == 'edit_data_id') {

            /**
             * Sanitize function for array || object from the admin drag and drop data
             */
            function sanitize_text_or_array_field($array_or_string) {
                if( is_string($array_or_string) ){
                    $array_or_string = sanitize_text_field($array_or_string);
                }elseif( is_array($array_or_string) ){
                    foreach ( $array_or_string as $key => &$value ) {
                        if ( is_array( $value ) ) {
                            $value = sanitize_text_or_array_field($value);
                        }
                        else {
                            $value = sanitize_text_field( $value );
                        }
                    }
                } 
                return $array_or_string;
            }

            function sfsf_escapping($sfsf_jsonData){
                return $sfsf_jsonData;
            }
            
            /**
             * Sanitize all drag drop data
             */
            $editID = sanitize_text_or_array_field($_POST['result']);
            $SFSF_editID = $postID = isset($editID) ? intval($editID) : null;
            global $wpdb;
            $wpdb->hide_errors();
            $table=$wpdb->prefix. 'simple_form_tables';
            $results = $wpdb->get_results(
                "SELECT `form_fields` from $table WHERE id =$SFSF_editID"
            );
        
            foreach($results as $row)
            {   }
            $udata= $row->form_fields;
            $trimJson = substr($udata, 1, strlen($udata) - 2);
            $output_data = sanitize_text_field($trimJson);
            $res = sfsf_escapping($output_data);
            echo wp_kses_data($res);
            wp_die();
        }

    }

    /**
     * Form Submission
     */
    public function SFSF_contact_form_submission() {

        if ($_POST['action'] == 'SFSF_contact_form_submission') {

             /**
             * Sanitize function for array || object from the admin drag and drop data
             */
            function sanitize_text_or_array_field($array_or_string) {
                if( is_string($array_or_string) ){
                    $array_or_string = sanitize_text_field($array_or_string);
                }elseif( is_array($array_or_string) ){
                    foreach ( $array_or_string as $key => &$value ) {
                        if ( is_array( $value ) ) {
                            $value = sanitize_text_or_array_field($value);
                        }
                        else {
                            $value = sanitize_text_field( $value );
                        }
                    }
                } 
                return $array_or_string;
            }
            /**
             * Sanitize all drag drop data
             */

            $action=sanitize_text_or_array_field($_POST['action']) ?? '';
            $data_id_val = sanitize_text_or_array_field($_POST['data_id_val']) ?? '';
            $input = sanitize_text_or_array_field($_POST['input']) ?? '';
            $number = sanitize_text_or_array_field($_POST['number'])?? '';
            $email = sanitize_text_or_array_field($_POST['email'])?? '';
            $textarea = sanitize_text_or_array_field($_POST['textarea'])?? '';
            $select = sanitize_text_or_array_field($_POST['select']) ?? '';
            $radio = sanitize_text_or_array_field($_POST['radio'])?? '';
            $checkbox = sanitize_text_or_array_field($_POST['checkbox']) ?? '';
            $date = sanitize_text_or_array_field($_POST['date']) ?? '';
            $myfile = sanitize_text_or_array_field($_POST['myfile']) ?? '';

            $SFSF_user_data = array(
                'input'=>$input ?: false,
                'number'=>$number ?: false,
                'email'=>$email ?: false,
                'textarea'=>$textarea ?: false,
                'select'=>$select ,
                'radio'=>$radio ?: false,
                'checkbox'=>$checkbox ?: false,
                'date'=>$date ?: false,
                'myfile'=>$myfile ?: false,
            );

            if ($SFSF_user_data) { 
                $jdata= json_encode($SFSF_user_data , true);
                // date_default_timezone_set('UTC');
                $date = date('Y-m-d H:i:s');
                global $wpdb;
                $table=$wpdb->prefix. 'simple_form_tables_values';
                $data = array( 'form_fields' => $jdata, 'time' => $date);
                $format = array('%s','%s');
                $wpdb->insert($table,$data,$format);
                $save = $wpdb->insert_id;
            }
            wp_die();
        }

    }
    
 
}