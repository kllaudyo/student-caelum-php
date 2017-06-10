<?php

    require_once("acesso.php");
    verifica_usuario();

    require_once("configuracao.php");
    require_once("cabecalho.php");
    require_once("conexao.php");
    require_once("Produto.php");
    require_once("Categoria.php");
    require_once("banco-produto.php");
    require_once("bootstrap.php");

    $categoria = new Categoria();
    $produto = new Produto();

    $produto->nome = $_POST["nome"];
    $produto->preco = $_POST["preco"];
    $produto->descricao = $_POST["descricao"];
    $categoria->id = $_POST["categoria"];
    $produto->categoria = $categoria;
    $produto->usado = isset($_POST["usuado"]) ? "true" : "false";

    if(insereProduto($database_connection, $produto))
    {
        alert_success("Produto {$produto->nome}, R$ {$produto->preco} adicionado com sucesso!");
    }
    else
    {
        alert_danger("Não foi possível inserir no banco de dados, verifique seu sql");
    }

    mysqli_close($database_connection);

    require_once("rodape.php");