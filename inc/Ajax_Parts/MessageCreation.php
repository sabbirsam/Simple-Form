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
    }


    public function message_creation() {

        if ($_POST['action'] == 'simple_message') {
            $result = $_POST['form_field'];
            echo $result;
            // echo json_encode($result, true);
            wp_die();
        }

    }

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
    
 
}