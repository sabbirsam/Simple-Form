<?php

namespace Inc;

class SFSF_Deactivate{

    public static function deactivate(){ 
        flush_rewrite_rules();
    }
}