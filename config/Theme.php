<?php
class Theme{
    private static $index = array(
        'head.tpl.php',
        'header.tpl.php',
        'nav.tpl.php',
        'Index.tpl.php',
        'end.tpl.php'
    );
    public static function getIndexMap(){return self::$index;}
    
    
    
    
    
    
    
    private function __construct() {}
    private function __clone() {}
}