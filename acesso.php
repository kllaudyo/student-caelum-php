<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 09/06/17
 * Time: 20:56
 */

    session_start();

    function verifica_usuario()
    {
        if(!usuario_esta_logado()){
            header("Location: index.php?falhaDeSeguranca=1");
            die();
        }
    }

    function usuario_logado()
    {
        return $_SESSION["login"];
    }

    function usuario_esta_logado()
    {
        return isset($_SESSION["login"]);
    }

    function login($usuario)
    {
        setcookie("login", $usuario);
        $_SESSION["login"] = $usuario;
    }

    function logout()
    {
        session_destroy();
    }
