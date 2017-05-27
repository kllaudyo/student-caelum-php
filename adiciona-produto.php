<?php

    require_once("cabecalho.php");
    require_once("conexao.php");
    require_once("banco-produto.php");

    $nome = $_GET["nome"];
    $preco = $_GET["preco"];

    if(insereProduto($database_connection, $nome, $preco)){
        echo "<p class=\"alert alert-success\">Produto {$nome}, R$ {$preco} adicionado com sucesso!</p>";
    }else{
        echo "<div class=\"alert alert-danger\">Não foi possível inserir no banco de dados, verifique seu sql</div>";    
    }

    mysqli_close($database_connection);

    require_once("rodape.php");