<?php

namespace Inc;
use \Inc\SFSF_BaseController;

class SFSF_Enqueue extends SFSF_BaseController{

    function register(){
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) ); 
        add_action( 'wp_enqueue_scripts', array( $this, 'public_enqueue' ) ); 
    }

    public function admin_enqueue($screen){
        /**
         * Global drag and drop form field
         */
        wp_enqueue_script( 'simple_form_drag_drop_js', $this->plugin_url . 'assets/admin/formfield/js/form-builder.js',null,1.0,true ); 

        /**
         * Dashboard user input data show
         */
        if("toplevel_page_simple_form" == $screen 
        ){
            wp_enqueue_style( 'simple_form_admin_css', $this->plugin_url .'assets/admin/sfsf_admin_style.css');
            wp_enqueue_script( 'simple_form_admin_js', $this->plugin_url .'assets/admin/sfsf_admin_script.js', array('jquery'),1.0,true );
            wp_localize_script( 'simple_form_admin_js', 'show_user_inputed_data', array(
                'ajaxurl'=>admin_url("admin-ajax.php", null)
                ) );
                wp_enqueue_script('jquery');
                wp_enqueue_script('simple_form_admin_js');    

            /**
             * Dashboard
             */
            wp_enqueue_script( 'simple_form_sweetalert_js', $this->plugin_url . 'assets/admin/formfield/js/sweetalert2@11.js',array('jquery'),1.0,true );
            wp_enqueue_script( 'simple_form_query_dataTables_min_js', '//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js',array('jquery'),1.0,true );// datatable
            wp_enqueue_script( 'simple_form_bootstrap2_min_js', '//cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js',array('jquery'),1.0,true );
            wp_enqueue_script( 'simple_form_bootstrap.bundle.min.js', '//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js',array('jquery'),1.0,true );//for action to edit/delete
            wp_enqueue_style( 'simple_form_jquery_dataTables.min', '//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css' ); // datatable
            wp_enqueue_style( 'simple_form_main2_css_style', $this->plugin_url . 'assets/admin/formfield/css/form_data.css' );
            wp_enqueue_style( 'simple_form_bootstrap.css', '//cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css' );// datatable
            wp_enqueue_style( 'simple_form_dataTables.bootstrap4.min.css', $this->plugin_url . 'assets/admin/data-table/dataTables.bootstrap4.min.css' ); // datatable
                 
        }
            /**
             * Form
             */
        if("simple-form_page_create_form" == $screen ){
            wp_register_script( 'simple_form_main_js', $this->plugin_url . 'assets/admin/formfield/js/simple_form_create.js',array('jquery'),1.0,true );
            wp_localize_script( 'simple_form_main_js', 'simple_message_form_submission', array( 

                'ajaxurl'=>admin_url("admin-ajax.php", null)
            ) );
            wp_enqueue_script('jquery');
            wp_enqueue_script('simple_form_main_js');
            wp_enqueue_style( 'simple_form_main_css_style', $this->plugin_url . 'assets/admin/formfield/css/simple_form_create.css' );            
        }
            /**
             * Data
             */
        if("simple-form_page_form_data" == $screen ){
            /**
             * Edit form 
             */
            wp_register_script( 'sfsf_main_edit_js', $this->plugin_url . 'assets/admin/formfield/js/edit_form_data.js',array('jquery'),1.0,true );
            wp_localize_script( 'sfsf_main_edit_js', 'edit_data_id', array(
                'ajaxurl'=>admin_url("admin-ajax.php", null)
            ) );
            wp_enqueue_script('jquery');
            wp_enqueue_script('sfsf_main_edit_js');
             /**
             * Delete
             */
            wp_register_script( 'simple_form_main2_jss', $this->plugin_url . 'assets/admin/formfield/js/form_data.js',array('jquery'),1.0,true );
            wp_localize_script( 'simple_form_main2_jss', 'simple_message_delete_form', array( 
                'ajaxurl'=>admin_url("admin-ajax.php", null)
            ) );
            wp_enqueue_script('jquery');
            wp_enqueue_script('simple_form_main2_jss');
            /**
             * Update Edit Form
             */
            wp_register_script( 'simple_form_main_js', $this->plugin_url . 'assets/admin/formfield/js/simple_form_create.js',array('jquery'),1.0,true );
            wp_localize_script( 'simple_form_main_js', 'simple_message_form_submission', array( 
                'ajaxurl'=>admin_url("admin-ajax.php", null)
            ) );
            wp_enqueue_script('jquery');
            wp_enqueue_script('simple_form_main_js');
            wp_enqueue_script( 'simple_form_sweetalert_js', $this->plugin_url . 'assets/admin/formfield/js/sweetalert2@11.js',array('jquery'),1.0,true );
            wp_enqueue_script( 'simple_form_query_dataTables_min_js', '//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js',array('jquery'),1.0,true );// datatable
            wp_enqueue_script( 'simple_form_bootstrap2_min_js','//cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js',array('jquery'),1.0,true );
            wp_enqueue_script( 'simple_form_bootstrap.bundle.min.js', '//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js',array('jquery'),1.0,true );//for action to edit/delete
            wp_enqueue_style( 'simple_form_jquery_dataTables.min', '//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css' ); // datatable
            wp_enqueue_style( 'simple_form_main2_css_style', $this->plugin_url . 'assets/admin/formfield/css/form_data.css' );
            wp_enqueue_style( 'simple_form_bootstrap.css', '//cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css' );// datatable    
            wp_enqueue_style( 'simple_form_dataTables.bootstrap4.min.css', $this->plugin_url . 'assets/admin/data-table/dataTables.bootstrap4.min.css' ); // datatable
        }
        /**
         * Global end script for drag and drop form builder UI
         */
        wp_enqueue_script( 'simple_form_bootstrap_min_js','//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js',array('jquery'),1.0,true );
        wp_enqueue_script( 'simple_form_sweetalert_js', $this->plugin_url . 'assets/admin/formfield/js/sweetalert2@11.js',array('jquery'),1.0,true );
        wp_enqueue_script( 'simple_form_jquery_ui_min_js', '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js',null,1.0,true );
    }
     /**
     * Frontend form
     */
    public function public_enqueue(){
            wp_enqueue_script( 'simple_form_sweetalerts_js', $this->plugin_url . 'assets/admin/formfield/js/sweetalert2@11.js',array('jquery'),1.0,true );
            wp_enqueue_style( 'simple_form_public_css',  $this->plugin_url .'assets/public/sf_public_style.css');
            wp_enqueue_script( 'simple_form_public_js',  $this->plugin_url .'assets/public/sf_public_script.js', array('jquery'),1.0,true );
            wp_localize_script( 'simple_form_public_js', 'SFSF_contact_form_submission', array(
                'ajaxurl'=>admin_url("admin-ajax.php", null)
            ) );
            wp_enqueue_script('jquery');
    }

}