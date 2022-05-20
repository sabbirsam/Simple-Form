<?php

namespace Inc;

class Deactivate{

    public static function deactivate(){ //make it static so I can call it direct 
        flush_rewrite_rules();
    }
}

