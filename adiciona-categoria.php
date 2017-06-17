<?php

    require_once("configuracao.php");
    require_once("acesso.php");
    verifica_usuario();
    require_once("cabecalho.php");
    require_once("conexao.php");
    require_once("bootstrap.php");

    $categoria = new Categoria();
    $categoria->setNome($_POST["nome"]);

    $dao = new CategoriaDAO($database_connection);

    if($dao->insereCategoria($categoria))
    {
        alert_success("Categoria {$categoria->getNome()} adicionada com sucesso!");
    }
    else
    {
        alert_danger("Não foi possível inserir no banco de dados, verifique seu sql");
    }

    mysqli_close($database_connection);

    require_once("rodape.php");