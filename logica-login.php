<?php
    require_once("acesso.php");
    require_once("configuracao.php");
    require_once("conexao.php");
    require_once("banco-usuario.php");

    $login = $_POST["email"];
    $senha = $_POST["senha"];
    $senha_md5 = md5($senha);

    $usuario = buscarUsuario($database_connection, $login, $senha_md5);

    if($usuario==null)
    {
        header("Location: index.php?login=0");
    }
    else
    {
        login($usuario["login"]);
        header("Location: produto-lista.php");
    }