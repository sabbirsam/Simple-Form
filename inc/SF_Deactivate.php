<?php

namespace Inc;

class SF_Deactivate{

    public static function deactivate(){ 
        flush_rewrite_rules();
    }
}