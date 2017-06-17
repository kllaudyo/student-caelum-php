<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    function debug($resource)
    {
        print "<pre>";
        print_r($resource);
        print "<pre>";
        die();
    }

    function auto_loading($class_name)
    {
        require_once "{$class_name}.php";
    }

    spl_autoload_register("auto_loading");