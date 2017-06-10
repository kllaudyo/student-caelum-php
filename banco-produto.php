<?php

    require_once("Produto.php");
    require_once("Categoria.php");

    /*
        mysql_[functions] versão mantida por compatibilidade
        mysqli_[functions] versão melhorada e otimizada
    */

    /*
        mysqli_query = retorna boleano caso insert, delete, update
        mysqli_query = retorna resultSet caso sql query
    */

    function insereProduto($database_connection, $produto)
    {
        $database_query = "insert 
                             into produtos
                                  (nome, preco, descricao, categoria_id, usado) 
                           values 
                                  ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->getUsado()})";

        $database_result = mysqli_query($database_connection, $database_query);
        return $database_result;
    }

    function removeProduto($database_connection, $id)
    {
        $database_query = "delete from produtos where id = {$id}";
        $database_result = mysqli_query($database_connection, $database_query);
        return $database_result;
    }

    function listaProdutos($database_connection)
    {
        $database_query = "select p.*, c.nome as categoria_nome
                             from produtos p 
                             left 
                             join categorias c 
                               on p.categoria_id = c.id
                            order 
                               by p.id
                             ";

        $database_result = mysqli_query($database_connection, $database_query);
        $produtos = array(); // ou []
        
        while($data = mysqli_fetch_assoc($database_result)){
            
            $produto = new Produto();
            $categoria = new Categoria();
            
            $categoria->setNome($data["categoria_nome"]);
            
            $produto->setId($data["id"]);
            $produto->setNome($data["nome"]);
            $produto->setPreco($data["preco"]);
            $produto->setDescricao($data["descricao"]);
            $produto->setCategoria($categoria);
            $produto->setUsado($data["usado"]);
            
            array_push($produtos, $produto); // ou $produtos[] = $produto;
        
        }
        
        return $produtos;
    }
