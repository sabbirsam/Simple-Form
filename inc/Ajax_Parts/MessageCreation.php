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
        /**
         * Form EDIT
         */
        $this->edit_data_id();
    }

    /**
     * delete
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
           
            $sanitizedData = isset( $_POST['result']) ? $_POST['result'] :'';
            $formData =  isset( $_POST['form_field']) ? $_POST['form_field'] : '' ;
            $Data_ID = isset( $_POST['id']) ? $_POST['id'] :'';
            $Data_Name = isset($_POST['f_name'])?$_POST['f_name']:'';
            $Data_update_result = isset($_POST['update_results'])?$_POST['update_results']:'';
            
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

            /**
             * Update edit
             */
            if ($Data_ID) {

                $Data_ID = $_POST['id'];
                $Data_Name = $_POST['f_name'];
                $Data_update_result = $_POST['update_results']; // this need to add [] 
                $update_data = array($Data_update_result);

                $up_data= json_encode($update_data, true);         
                date_default_timezone_set('Asia/Dhaka');
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
     * Form EDIT
     */
    public function edit_data_id() {

        if ($_POST['action'] == 'edit_data_id') {
            $editID = $_POST['result'];
            $sf_editID = $postID = isset($editID) ? intval($editID) : null;
            global $wpdb;
            $wpdb->hide_errors();
            $table=$wpdb->prefix. 'simple_form_tables';
            $results = $wpdb->get_results(
                "SELECT `form_fields` from $table WHERE id =$sf_editID"
            );
        
            foreach($results as $row)
            {   }
            $udata= $row->form_fields;
            $trimJson = substr($udata, 1, strlen($udata) - 2);
            echo $trimJson;
            // set_transient( 'sf_current_edit_data', $trimJson, 86400 );    
            // set_transient( 'sf_current_edit_data', $trimJson, 300 );  
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
            $date = $_POST['date'] ?? '';
            $myfile = $_POST['myfile'] ?? '';

            $sf_user_data = array(
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