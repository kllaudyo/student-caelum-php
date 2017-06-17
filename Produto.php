<?php

/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 10/06/17
 * Time: 10:08
 */

class Produto
{
    private $id;
    private $nome;
    private $descricao;
    private $categoria;
    private $usado;

    protected $preco;
    
#    public function __construct($id="", $nome="", $preco=0, $descricao="", $categoria=new Categoria(), $usado=)
#    {
#        $this->id = $id;
#        $this->nome = $nome;
#        $this->preco = $preco;
#        $this->descricao = $descricao;
#        $this->categoria = $categoria;
#        $this->usado = $usado;
#    }

    public function precoComDesconto(){
        return $this->preco * 0.9;
    }
    
    public function __toString(){
        return "{$this->id} : {$this->nome} : {$this->preco} : {$this->descricao} : {$this->usado} : {$this->categoria}";
    }
    
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

	public function getPreco(){
		return $this->preco;
	}

	public function setPreco($preco){
		$this->preco = $preco;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getCategoria(){
		return $this->categoria;
	}

	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}

	public function getUsado(){
		return $this->usado;
	}

	public function setUsado($usado){
		$this->usado = $usado;
	}

	public function temIsbn(){
	    return $this->temWaterMark() || $this->temTaxaImpressao();
    }

    public function temWaterMark(){
	    return $this instanceof Ebook;
    }

    public function temTaxaImpressao(){
        return $this instanceof LivroFisico;
    }

}