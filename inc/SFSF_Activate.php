<?php
/**
 * 
 */
namespace SFSF\Inc;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

class SFSF_Activate{

    public static function sfsf_activate(){ //make it static so I can call it direct on a function
        flush_rewrite_rules();
    }
}