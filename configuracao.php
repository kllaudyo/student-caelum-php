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