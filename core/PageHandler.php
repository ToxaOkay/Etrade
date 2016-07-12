<?php
class PageHandler extends CommonST {
    private static $hInst = null;
    public static function getInstance() {
        if (!empty(self::$hInst = null)) {
            return self::$hInst;
        } else {
            return self::$hInst = new self();
        }
    }
    public function init() {
        $require = RequireHandler::getInstance();
        $controllerName = $require->getControllerName();
        if ($controllerName != null) {
            $this->loadController($controllerName);
        } else {
            echo IndexHandler::getInstance()->view();
        }
    }
    private function loadController($name) {
        $name .= 'Handler';
        $controller = $name::getInstance();
        $controller->init();
    }
}