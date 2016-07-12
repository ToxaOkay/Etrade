<?php
    class RequireHandler extends CommonST{
        private static $hInst = null;
        private static $require = array(
            "controller" => '',
            "method" => '',
            "getArgs" => array(null),
            "postArgs" => array(null)
        );
        
        public static function getInstance() {
            if (!empty(self::$hInst = null)) {
                return self::$hInst;
            } else {
                return self::$hInst = new self();
            }
        }

        public function init() {
            $req = explode("/", trim(explode( "?" , $_SERVER["REQUEST_URI"])[0], '/'));
            self::$require["controller"] = ((count($req) > 0) ? (ucfirst(htmlspecialchars($req[0]))): null);
            self::$require["method"] = ((count($req) > 1) ? (ucfirst(htmlspecialchars($req[1]))): null);
            self::$require["getArgs"] = $_GET;
            foreach (self::$require["getArgs"] as $value) {
                $value = htmlspecialchars($value);
            }
            self::$require["postArgs"] = $_POST;
            foreach (self::$require["postArgs"] as $value) {
                $value = htmlspecialchars($value);
            }
        }
        public function getControllerName(){
            return (!empty(self::$require["controller"])) ? (self::$require["controller"]) : null;
        }
        public function getMethod(){
            return (!empty(self::$require["method"])) ? (self::$require["method"]) : null;
        }
        public function getArgs($type, $name){
            return (!empty(self::$require[$type][$name]) ? self::$require[$type][$name] : null);
        }
    }