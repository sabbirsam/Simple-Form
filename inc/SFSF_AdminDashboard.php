<?php

namespace Inc;

class SFSF_AdminDashboard{
    function __construct(){
        add_action("admin_menu", array($this, 'add_admin_pages'));
    }

    public function add_admin_pages(){
        add_menu_page( 
            'Simple-Form', //page title
            'Simple-Form',  //menus title
            'manage_options', //capa
            'simple_form', //slug
            array($this, 'form_pages'),//function 
            'dashicons-welcome-widgets-menus',
                90 );
        add_submenu_page(
            'simple_form', 'Form', 'Form', 'manage_options', 'create_form', 
            array( $this, 'form_sub_pages' )
        );
        add_submenu_page(
            'simple_form', 'Data', 'Data', 'manage_options', 'form_data', 
            array( $this, 'form_data_pages' )
        );
    }
  
    public function form_pages()
    {
        require_once plugin_dir_path(__FILE__).'../template/dashboard.php';
    }
    public function form_sub_pages()
    {
        require_once plugin_dir_path(__FILE__).'../template/create-form.php';
    }
    public function form_data_pages()
    {
        require_once plugin_dir_path(__FILE__).'../template/form-data.php';
    }

}