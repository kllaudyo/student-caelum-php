<?php

    function insereCategoria($database_connection, $nome)
    {
        $database_query = "insert into categorias(nome) values ('{$nome}')";
        $database_result = mysqli_query($database_connection, $database_query);
        return $database_result;
    }

    function removeCategoria($database_connection, $id)
    {
        $database_query = "delete from categorias where id = {$id}";
        $database_result = mysqli_query($database_connection, $database_query);
        return $database_result;
    }

    function listaCategorias($database_connection)
    {
        $database_query = "select * from categorias";
        $database_result = mysqli_query($database_connection, $database_query);
        $categorias = array();
        while ($categoria = mysqli_fetch_assoc($database_result)){
            array_push($categorias, $categoria);
        }
        return $categorias;
    }