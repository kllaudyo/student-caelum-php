<?php

    function alert_success($msg)
    {
        echo "<p class='alert alert-success'>{$msg}</p>";
    }

    function alert_danger($msg)
    {
        echo "<p class='alert alert-danger'>{$msg}</p>";
    }

    function h1($text)
    {
        echo "<h1>{$text}</h1>";
    }

    function h2($text)
    {
        echo "<h2>{$text}</h2>";
    }

    function html(&$html, $fragment)
    {
        $html .= $fragment;
    }

    function table($headers, $bodies)
    {

    }