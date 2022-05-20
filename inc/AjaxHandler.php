<?php

namespace Inc;
use \Inc\Ajax_Parts\MessageCreation;

class AjaxHandler {

    public function __construct() {
        $this->events();
    }

    public function events() {
        /* Demo check Creation */
        add_action( 'wp_ajax_simple_message', array( $this, 'message_creation' ) ); 
        add_action("wp_ajax_nopriv_simple_message", array( $this, "message_creation"));
        /**
         * Form create
         */
        add_action( 'wp_ajax_simple_message_form_submission', array( $this, 'simple_message_form_submission' ) ); 
        add_action("wp_ajax_nopriv_simple_message_form_submission", array( $this, "simple_message_form_submission"));
        
    }

    function message_creation() {
        $message_creation = new MessageCreation();
        $message_creation->message_creation();
        
    }

    function simple_message_form_submission() {
        $simple_message_form_submission = new MessageCreation();
        $simple_message_form_submission->simple_message_form_submission();
        
    }

    
}