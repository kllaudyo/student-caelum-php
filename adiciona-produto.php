<?php

    require_once("acesso.php");
    verifica_usuario();

    require_once("configuracao.php");
    require_once("cabecalho.php");
    require_once("conexao.php");
    require_once("banco-produto.php");
    require_once("bootstrap.php");

    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $descricao = $_POST["descricao"];
    $categoria_id = $_POST["categoria"];
    $usuado = isset($_POST["usuado"]) ? "true" : "false";

    if(insereProduto($database_connection, $nome, $preco, $descricao, $categoria_id, $usuado))
    {
        alert_success("Produto {$nome}, R$ {$preco} adicionado com sucesso!");
    }
    else
    {
        alert_danger("Não foi possível inserir no banco de dados, verifique seu sql");
    }

    mysqli_close($database_connection);

    require_once("rodape.php");