<?php
/**
 * Plugin Name: Simple Form
 *
 * @author            Sabbir Sam, devsabbirahmed
 * @copyright         2022- Sabbir Sam, Kevin Chappell from fromBuilder
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Simple Form
 * Plugin URI: https://github.com/sabbirsam/Simple-Form/tree/free
 * Description: It's a simple contact form that lets you easily create forms via drag and drop feature. Its also free to collect all leads from the created forms. This plugin is not yet officially made for selling, it is mainly made for learning.
 * Version:           1.0.3
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

use SFSF\Inc\SFSF_Activate;
use SFSF\Inc\SFSF_Deactivate;
use SFSF\Inc\SFSF_Enqueue;
use SFSF\Inc\SFSF_AdminDashboard;
use SFSF\Inc\SFSF_BaseController;
use SFSF\Inc\SFSF_AjaxHandler;
use SFSF\Inc\SFSF_DbTables;
use SFSF\Inc\SFSF_SaveTablesData;
use SFSF\Inc\SFSF_SfShortcode;

if(!class_exists('SFSF_SimpleForm')){
    class SFSF_SimpleForm{
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
            new SFSF_AdminDashboard(); 
            $enqueue=new SFSF_Enqueue();
            $enqueue->register();
            new SFSF_BaseController();
            new SFSF_AjaxHandler();
            $create_table = new SFSF_DbTables();
            $save_table = new SFSF_SaveTablesData();
            new SFSF_SfShortcode();
        }
        function sfsf_activate(){   
            SFSF_Activate::sfsf_activate();
        }
        function sfsf_deactivate(){ 
            SFSF_Deactivate::sfsf_deactivate(); 
        }
    }
    $simpleform = new SFSF_SimpleForm;
    $simpleform ->register();
    register_activation_hook (__FILE__, array( $simpleform, 'sfsf_activate' ) );
    register_deactivation_hook (__FILE__, array( $simpleform, 'sfsf_deactivate' ) );
}