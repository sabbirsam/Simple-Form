<?php
/**
 * Plugin Name: Simple Form
 *
 * @author            Sabbir Sam
 * @copyright         2022- Sabbir Sam, Kevin Chappell
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Simple Form
 * Plugin URI: https://github.com/sabbirsam/Simple-Form/tree/free
 * Description: It's a simple contact form that lets you easily create forms via drag and drop feature. Its also free to collect all leads from the created forms. This plugin is not yet officially made for selling, it is mainly made for learning.
 * Version:           1.0.0
 * Requires at least: 5.9 or higher
 * Requires PHP:      5.4 or higher
 * Author:            SABBIRSAM
 * Author URI:        https://github.com/sabbirsam/
 * Text Domain:       simple_form
 * Domain Path: /languages/
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * 
 */


defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

if (file_exists(dirname(__FILE__).'/vendor/autoload.php')) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}


use Inc\SF_Activate;
use Inc\SF_Deactivate;
use Inc\SF_Enqueue;
use Inc\SF_AdminDashboard;
use Inc\SF_BaseController;
use Inc\SF_AjaxHandler;
use Inc\SF_DbTables;
use Inc\SF_SaveTablesData;
use Inc\SF_SfShortcode;

if(!class_exists('SF_SimpleForm')){
    class SF_SimpleForm{
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
            new SF_AdminDashboard(); 
            $enqueue=new SF_Enqueue();
            $enqueue->register();
            new SF_BaseController();
            new SF_AjaxHandler();
            $create_table = new SF_DbTables();
            $save_table = new SF_SaveTablesData();
            new SF_SfShortcode();
        }
        function activate(){   
            SF_Activate::activate();
        }
        function deactivate(){ 
            SF_Deactivate::deactivate(); 
        }
    }
    $simpleform = new SF_SimpleForm;
    $simpleform ->register();
    
    register_activation_hook (__FILE__, array( $simpleform, 'activate' ) );
    register_deactivation_hook (__FILE__, array( $simpleform, 'deactivate' ) );

}