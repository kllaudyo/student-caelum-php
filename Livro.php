<?php

/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 17/06/17
 * Time: 09:25
 */
abstract class Livro extends Produto
{
    private $isbn;

    public function __toString()
    {
        return parent::__toString()  . " : {$this->isbn}";
    }

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

//    public abstract function precoComDesconto();

}