<?php

/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 17/06/17
 * Time: 11:50
 */
class LivroFisico extends Livro
{
    private $taxaImpressao;

    public function __toString()
    {
        return parent::__toString() . " : {$this->taxaImpressao}";
    }

    public function getTaxaImpressao()
    {
        return $this->taxaImpressao;
    }

    public function setTaxaImpressao($taxaImpressao)
    {
        $this->taxaImpressao = $taxaImpressao;
    }

}