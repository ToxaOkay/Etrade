<?php
class TestHandler extends CommonST{
    private static $hInst = null;

    public static function getInstance()
    {
        if (!empty(self::$hInst = null)) {
            return self::$hInst;
        } else {
            return self::$hInst = new self();
        }
    }
    public function init() {
        echo 'test ok!';
    }
}