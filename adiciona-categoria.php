<?php

    #require_once("configuracao.php");
    require_once("acesso.php");
    verifica_usuario();

    require_once("cabecalho.php");
    require_once("conexao.php");
    require_once("banco-categoria.php");
    require_once("bootstrap.php");


    $nome = $_POST["nome"];

    if(insereCategoria($database_connection, $nome))
    {
        alert_success("Categoria {$nome} adicionada com sucesso!");
    }
    else
    {
        alert_danger("Não foi possível inserir no banco de dados, verifique seu sql");
    }

    mysqli_close($database_connection);

    require_once("rodape.php");