<?php

namespace SFSF\Inc;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

class SFSF_Deactivate{

    public static function deactivate(){ 
        flush_rewrite_rules();
    }
}