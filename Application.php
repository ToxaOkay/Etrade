<?php
    class Application {
        private static $hInst = null;

        private function __construct() {}

        public static function getInstance() {
            if (!empty(self::$hInst = null)) {
                return self::$hInst;
            } else {
                return self::$hInst = new self();
            }
        }
        public function init(){
            $this->setIncludes();
            RequireHandler::getInstance()->init();
        }
        public function run() {
            $pageHandler = PageHandler::getInstance();
            $pageHandler->init();
        }
        private function setIncludes() {
           $path = get_include_path();
            foreach (Config::getIncludePath() as $value) {
                $path .= PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR . $value ;
            }
            set_include_path($path);
        }
        public static function __autoload($file) {
            $pathes = explode(PATH_SEPARATOR, get_include_path());
            foreach ($pathes as $path) {
                if (file_exists($path. DIRECTORY_SEPARATOR .$file . ".php")) {
                    include $path. DIRECTORY_SEPARATOR .$file . ".php";
                    break;
                }
            }
        }
}