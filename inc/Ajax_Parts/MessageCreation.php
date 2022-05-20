<?php

namespace Inc\Ajax_Parts;
use \Inc\BaseController;

class MessageCreation {

    public function __construct() {
        /**
         * Demo tets
         */
        $this->message_creation();
        /**
         * Form Create
         */
        $this->simple_message_form_submission();
        /**
         * Form delete
         */
        $this->simple_message_delete_form();
        /**
         * Form Submission
         */
        $this->sf_contact_form_submission();
    }

    /**
     * Test
     */
    public function message_creation() {

        if ($_POST['action'] == 'show_user_inputed_data') {

            $permission = check_ajax_referer('sf_delete_post_nonce', 'nonce', false);
    
            if ($permission) {
                $df_delete_data = $_POST['df_delete_data'];
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
    public function simple_message_form_submission() {

        if ($_POST['action'] == 'simple_message_form_submission') {
           
            $sanitizedData = $_POST['result'];
            $formData =  $_POST['form_field'] ;
            
            if ($sanitizedData) {
   
                $jdata= json_encode($sanitizedData, true);
               
                date_default_timezone_set('Asia/Dhaka');
                $date = date('Y-m-d H:i:s');

                global $wpdb;
                $table=$wpdb->prefix. 'simple_form_tables';
                $data = array('form_name' => $formData, 'form_fields' => $jdata, 'time' => $date);
                $format = array('%s','%s');
                $wpdb->insert($table,$data,$format);
                $save = $wpdb->insert_id;
            }

            wp_die();
        }

    }

    /**
     * Form Delete
     */
    public function simple_message_delete_form() {

        if ($_POST['action'] == 'simple_message_delete_form') {
           
            $permission = check_ajax_referer('sf_delete_post_nonce', 'nonce', false);
    
            if ($permission) {
                $df_delete_data = $_POST['df_delete_data'];
                global $wpdb;
                $table=$wpdb->prefix. 'simple_form_tables';
                $wpdb->delete( $table, array( 'id' => $df_delete_data ) );               
            }


            wp_die();
        }

    }

    /**
     * Form Submission
     */
    public function sf_contact_form_submission() {

        if ($_POST['action'] == 'sf_contact_form_submission') {

            $action=$_POST['action'] ?? '';
            $data_id_val = $_POST['data_id_val'] ?? '';
            $input = $_POST['input'] ?? '';
            $number = $_POST['number']?? '';
            $email = $_POST['email']?? '';
            $textarea = $_POST['textarea']?? '';
            $select = $_POST['select'] ?? '';
            $radio = $_POST['radio']?? '';
            $checkbox = $_POST['checkbox'] ?? '';
            $date = $_POST['date'];
            $myfile = $_POST['myfile'] ?? '';

            $sf_user_data = array(
                // 'action'=>$action ?: false,
                // 'data_id_val'=>$data_id_val ?: false,
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
            if ($sf_user_data) { 
                $jdata= json_encode($sf_user_data , true);
                date_default_timezone_set('Asia/Dhaka');
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