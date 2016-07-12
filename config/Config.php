<?php
class Config {
    // $include_path = ['core','models','config','views'];
    private static $INCLUDE_PATH = ['controllers','core','models','config','views'];

    public static function getIncludePath() { return self::$INCLUDE_PATH;}



    private function __construct() {}
    private function __clone() {}
}


