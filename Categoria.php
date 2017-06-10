<?php

/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 10/06/17
 * Time: 10:41
 */
class Categoria
{
    public $id;
    public $nome;
    
    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
}