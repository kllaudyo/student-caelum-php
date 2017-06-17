<?php

/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 17/06/17
 * Time: 11:47
 */
class Ebook extends Livro
{
    private $waterMark;

    public function __toString()
    {
        return parent::__toString() . " : {$this->waterMark}" ;
    }

    public function getWaterMark()
    {
        return $this->waterMark;
    }

    public function setWaterMark($waterMark)
    {
        $this->waterMark = $waterMark;
    }

    public function precoComDesconto()
    {
        return $this->preco * 0.1;
    }

}