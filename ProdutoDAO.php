<?php

class ProdutoDAO
{
    private $database_connection;
    
    public function __construct($connection)
    {
        $this->database_connection = $connection;
    }

    public function salvaProduto($produto)
    {
        if(strlen(trim($produto->getId()))>0)
        {
            return $this->alteraProduto($produto);
        }
        else
        {
            return $this->insereProduto($produto);
        }
    }

    public function insereProduto($produto)
    {
        $isbn = "";
        if($produto->temIsbn()){
            $isbn = $produto->getIsbn();
        }

        $waterMark = "";
        if($produto->temWaterMark()){
            $waterMark = $produto->getWaterMark();
        }

        $taxaImpressao = "null";
        if($produto->temTaxaImpressao()){
            $taxaImpressao = $produto->getTaxaImpressao();
        }

        $database_query = "insert 
                             into produtos
                                  (nome, preco, descricao, categoria_id, usado, isbn, waterMark, taxaImpressao) 
                           values 
                                  ('{$produto->getNome()}'
                                  , {$produto->getPreco()} 
                                  ,'{$produto->getDescricao()}'
                                  , {$produto->getCategoria()->getId()}
                                  , {$produto->getUsado()}
                                  , '{$isbn}'
                                  , '{$waterMark}'
                                  , {$taxaImpressao}
                                  )";

        error_log($database_query);
        $database_result = mysqli_query($this->database_connection, $database_query);
        return $database_result;
    }

    public function alteraProduto($produto)
    {
        $isbn = "";
        if($produto->temIsbn()){
            $isbn = $produto->getIsbn();
        }

        $waterMark = "";
        if($produto->temWaterMark()){
            $waterMark = $produto->getWaterMark();
        }

        $taxaImpressao = "null";
        if($produto->temTaxaImpressao()){
            $taxaImpressao = $produto->getTaxaImpressao();
        }

        $database_query = "update produtos 
                              set nome='{$produto->getNome()}'
                                 ,preco = {$produto->getPreco()}
                                 ,descricao = '{$produto->getDescricao()}'
                                 ,categoria_id = '{$produto->getCategoria()->getId()}'
                                 ,usado = {$produto->getUsado()}
                                 ,isbn = '{$isbn}'
                                 ,waterMark = '{$waterMark}'
                                 ,taxaImpressao = {$taxaImpressao}
                            where id = {$produto->getId()} ";

        error_log($database_query);

        $database_result = mysqli_query($this->database_connection, $database_query);
        return $database_result;
    }

    public function removeProduto($id)
    {
        $database_query = "delete from produtos where id = {$id}";
        $database_result = mysqli_query($this->database_connection, $database_query);
        return $database_result;
    }

    public function listaProdutos()
    {
        $database_query = "select p.*, c.nome as categoria_nome
                             from produtos p 
                             left 
                             join categorias c 
                               on p.categoria_id = c.id
                            order 
                               by p.id
                             ";

        $database_result = mysqli_query($this->database_connection, $database_query);
        $produtos = array(); // ou []

        while($data = mysqli_fetch_assoc($database_result))
        {
            if($data["isbn"]=="")
            {
                $produto = new Produto();
            }
            elseif($data["waterMark"]!="")
            {
                $produto = new Ebook();
                $produto->setIsbn($data["isbn"]);
                $produto->setWaterMark($data["waterMark"]);
            }
            else
            {
                $produto = new LivroFisico();
                $produto->setIsbn($data["isbn"]);
                $produto->setTaxaImpressao($data["taxaImpressao"]);
            }

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

    public function buscarProdutoPorId($id)
    {
        $database_query = "select p.*, c.id as categoria_id, c.nome as categoria_nome
                             from produtos p 
                             left 
                             join categorias c 
                               on p.categoria_id = c.id
                            where p.id = {$id}
                            order 
                               by p.id
                             ";
        $database_result = mysqli_query($this->database_connection, $database_query);



        if($data = mysqli_fetch_assoc($database_result))
        {
            if($data["isbn"]=="")
            {
                $produto = new Produto();
            }
            elseif($data["waterMark"]!="")
            {
                $produto = new Ebook();
                $produto->setIsbn($data["isbn"]);
                $produto->setWaterMark($data["waterMark"]);
            }
            else
            {
                $produto = new LivroFisico();
                $produto->setIsbn($data["isbn"]);
                $produto->setTaxaImpressao($data["taxaImpressao"]);
            }

            $categoria = new Categoria();
            $produto->setCategoria($categoria);

            $categoria->setId($data["categoria_id"]);
            $categoria->setNome($data["categoria_nome"]);    
            $produto->setId($data["id"]);
            $produto->setNome($data["nome"]);
            $produto->setPreco($data["preco"]);
            $produto->setDescricao($data["descricao"]);    
            $produto->setUsado($data["usado"]);

            return $produto;
        }

        return  null;
    }

}