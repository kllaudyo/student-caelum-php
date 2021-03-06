<?php

    require_once("acesso.php");
    verifica_usuario();

    require_once("cabecalho.php");
    require_once("conexao.php");
    require_once("ProdutoDAO.php");

    $id = $_POST["id"];
    $dao = new ProdutoDAO($database_connection);

    if($dao->removeProduto($id)){
        header("Location: produto-lista.php?excluido=true");
    }else{
        echo "<div class=\"alert alert-danger\">Não foi possível excluir no banco de dados, verifique seu sql</div>";    
    }

    mysqli_close($database_connection);

    require_once("rodape.php");