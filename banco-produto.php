<?php

    /*
        mysql_[functions] versão mantida por compatibilidade
        mysqli_[functions] versão melhorada e otimizada
    */

    /*
        mysqli_query = retorna boleano caso insert, delete, update
        mysqli_query = retorna resultSet caso sql query
    */

    function insereProduto($database_connection, $nome, $preco){
        $database_query = "insert into produtos(nome, preco) values ('{$nome}', {$preco})";
        $database_result = mysqli_query($database_connection, $database_query);
        return $database_result;
    }

    function removeProduto($database_connection, $id){
        $database_query = "delete from produtos where id = {$id}";
        $database_result = mysqli_query($database_connection, $database_query);
        return $database_result;
    }

    function listaProdutos($database_connection){
        $database_query = "select * from produtos";
        $database_result = mysqli_query($database_connection, $database_query);
        $produtos = array(); // ou []
        while($produto = mysqli_fetch_assoc($database_result)){
            array_push($produtos, $produto); // ou $produtos[] = $produto;
        }
        return $produtos;
    }