<?php
/*
Plugin Name: Simple Form
Plugin URI: http://wppool.dev
Description: Base plugin for Initial Work.
Version: 1.0.0
Author: WPPOOL
Author URI: http://wppool.dev
Requires at least: 5.0
Requires PHP:      5.4
License:           GPL-2.0+
License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain: simple_form
*/

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

if (file_exists(dirname(__FILE__).'/vendor/autoload.php')) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}


use Inc\Activate;
use Inc\Deactivate;
use Inc\Enqueue;
use Inc\AdminDashboard;
use Inc\BaseController;
use Inc\AjaxHandler;
use Inc\DbTables;
use Inc\SaveTablesData;
use Inc\SfShortcode;




if(!class_exists('SimpleForm')){
    class SimpleForm{
        public $simple_form_base;
        public function __construct(){
            $this->includes();
            $this->simple_form_base = plugin_basename(__FILE__); 
        }
        function register(){
            add_action("plugins_loaded", array( $this, 'simple_form_load' ));
            
            
        }
        function simple_form_load(){
            load_plugin_textdomain('simple_form', false,dirname(__FILE__)."languages");
        }

        /**
         * Classes 
         */
        public function includes() {
            new AdminDashboard();
            
            $enqueue=new Enqueue();
            $enqueue->register();
            
            new BaseController();

            new AjaxHandler();
            
            $create_table = new DbTables();
            $save_table = new SaveTablesData();
            
            new SfShortcode();
          
        }

        function activate(){   
            Activate::activate();
        }
        function deactivate(){ 
            Deactivate::deactivate(); 
        }

    }

    
    $simpleform = new SimpleForm;
    $simpleform ->register();
    
    register_activation_hook (__FILE__, array( $simpleform, 'activate' ) );
    register_deactivation_hook (__FILE__, array( $simpleform, 'deactivate' ) );

}