<?php

class IndexHandler extends CommonST {
    private static $hInst = null;

    public static function getInstance()
    {
        if (!empty(self::$hInst = null)) {
            return self::$hInst;
        } else {
            return self::$hInst = new self();
        }
    }

    public function view()
    {
        ob_start();
        foreach (Theme::getIndexMap() as $name) {
            include $name;
        }
        return ob_get_clean();
    }


}