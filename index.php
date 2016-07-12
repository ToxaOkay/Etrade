<?php
    include "config/Config.php";
    include "Application.php";

    function __autoload($name) {
        Application::__autoload($name);
    }
    $app = Application::getInstance();
    $app->init();
    $app->run();
    var_dump(Navigation::getInstance()->getNavigation());