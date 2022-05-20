<?php

namespace Inc;
use \Inc\Ajax_Parts\MessageCreation;

class AjaxHandler {

    public function __construct() {
        $this->events();
    }

    public function events() {
        /* Demo check Creation */
        add_action( 'wp_ajax_show_user_inputed_data', array( $this, 'message_creation' ) ); 
        add_action("wp_ajax_nopriv_show_user_inputed_data", array( $this, "message_creation"));
        /**
         * Form create
         */
        add_action( 'wp_ajax_simple_message_form_submission', array( $this, 'simple_message_form_submission' ) ); 
        add_action("wp_ajax_nopriv_simple_message_form_submission", array( $this, "simple_message_form_submission"));
         /**
         * Form delete
         */
        add_action( 'wp_ajax_simple_message_delete_form', array( $this, 'simple_message_delete_form' ) ); 
        add_action("wp_ajax_nopriv_simple_message_delete_form", array( $this, "simple_message_delete_form"));
         /**
         * Form Submission
         */
        add_action( 'wp_ajax_sf_contact_form_submission', array( $this, 'sf_contact_form_submission' ) ); 
        add_action("wp_ajax_nopriv_sf_contact_form_submission", array( $this, "sf_contact_form_submission"));
        /**
         * Form EDIT
         */
        add_action( 'wp_ajax_edit_data_id', array( $this, 'edit_data_id' ) ); 
        add_action("wp_ajax_nopriv_edit_data_id", array( $this, "edit_data_id"));
        /**
         * update EDIT Data
         */
        add_action( 'wp_ajax_edit_data_id', array( $this, 'edit_data_id' ) ); 
        add_action("wp_ajax_nopriv_edit_data_id", array( $this, "edit_data_id"));
        
    }

    /**Demo check Creation */
    function message_creation() {
        $message_creation = new MessageCreation();
        $message_creation->message_creation();
        
    }
    /**
     * Form create
     */
    function simple_message_form_submission() {
        $simple_message_form_submission = new MessageCreation();
        $simple_message_form_submission->simple_message_form_submission();
        
    }
    /**
     * Form Delete
    */
    function simple_message_delete_form() {
        $simple_message_delete_form = new MessageCreation();
        $simple_message_delete_form->simple_message_delete_form();
        
    }
    /**
     * Form Submission
    */
    function sf_contact_form_submission() {
        $sf_contact_form_submission = new MessageCreation();
        $sf_contact_form_submission->sf_contact_form_submission();
        
    }
    /**
     * Form EDIT
    */
    function edit_data_id() {
        $edit_data_id = new MessageCreation();
        $edit_data_id->edit_data_id();
        
    }

    
}