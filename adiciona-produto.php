<?php

    require_once("acesso.php");
    verifica_usuario();

    require_once("configuracao.php");
    require_once("cabecalho.php");
    require_once("conexao.php");
    require_once("bootstrap.php");

    $categoria = new Categoria();
    $tipo = $_POST["tipoProduto"];

    if($tipo=="Ebook")
    {
        $produto = new Ebook();
        $produto->setIsbn($_POST["isbn"]);
        $produto->setWaterMark($_POST["waterMark"]);
    }
    elseif($tipo=="LivroFisico")
    {
        $produto = new LivroFisico();
        $produto->setIsbn($_POST["isbn"]);
        $produto->setTaxaImpressao($_POST["taxaImpressao"]);
    }
    else
    {
        $produto = new Produto();
    }


    $produto->setId($_POST["id"]);
    $produto->setNome($_POST["nome"]);
    $produto->setPreco($_POST["preco"]);
    $produto->setDescricao($_POST["descricao"]);
    $categoria->setId($_POST["categoria"]);
    $produto->setCategoria($categoria);
    $produto->setUsado(isset($_POST["usuado"]) ? "true" : "false");

    $dao = new ProdutoDAO($database_connection);
    if($dao->salvaProduto($produto))
    {
        alert_success("Produto {$produto->getNome()}, R$ {$produto->getPreco()} salvo com sucesso!");
    }
    else
    {
        alert_danger("Não foi possível inserir no banco de dados, verifique seu sql");
    }

    mysqli_close($database_connection);

    require_once("rodape.php");