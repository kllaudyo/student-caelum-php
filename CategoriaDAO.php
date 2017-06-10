<?php

class CategoriaDAO{

    private $database_connection;

    public function __construct($connection)
    {
        $this->database_connection = $connection;
    }
    
    public function insereCategoria($categoria)
    {
        $database_query = "insert into categorias(nome) values ('{$categoria->getNome()}')";
        $database_result = mysqli_query($this->database_connection, $database_query);
        return $database_result;
    }

    public function removeCategoria($id)
    {
        $database_query = "delete from categorias where id = {$id}";
        $database_result = mysqli_query($this->database_connection, $database_query);
        return $database_result;
    }

    public function listaCategorias()
    {
        $database_query = "select * from categorias";
        $database_result = mysqli_query($this->database_connection, $database_query);
        $categorias = array();
        while ($categoria = mysqli_fetch_assoc($database_result)){
            array_push($categorias, $categoria);
        }
        return $categorias;
    }

}