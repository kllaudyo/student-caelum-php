<?php

    require_once("configuracao.php");
    require_once("acesso.php");
    verifica_usuario();
    require_once("conexao.php");
    require_once("cabecalho.php");
    
    if(isset($_GET["id"]) && strlen(trim($_GET["id"])) > 0){
        $dao = new ProdutoDAO($database_connection);
        $produto = $dao->buscarProdutoPorId($_GET["id"]);
    }else{
        $produto = new Produto();
        $produto->setCategoria(new Categoria());
    }

?>
    <h1>Cadastro de Produtos</h1>
    <hr />
    <form action="adiciona-produto.php" method="post">
        <input type="hidden" name="id" value="<?=$produto->getId();?>" />
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="nome">Nome:</label>
            </div>
            <div class="col-sm-10">
                <input type="text" id="nome" name="nome" class="form-control" value="<?=$produto->getNome();?>" />
            </div>
        </div>
        <hr />
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="preco">Preço:</label>
            </div>
            <div class="col-sm-10">
                <input type="number" id="preco" name="preco" class="form-control" value="<?=$produto->getPreco();?>" />
            </div>
        </div>
        <hr />
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="descricao">Descrição:</label>
            </div>
            <div class="col-sm-10">
                <textarea id="descricao" name="descricao" class="form-control" rows="5"><?=$produto->getDescricao();?></textarea>
            </div>
        </div>
        <hr />
        <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="usuado" value="true" <?=$produto->getUsado()?'checked':''?> /> Usado
                    </label>
                </div>
            </div>
        </div>
        <hr />
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="categoria">Categoria:</label>
            </div>
            <div class="col-sm-10">
                <select name="categoria" id="categoria" class="form-control">
<?php
            $dao = new CategoriaDAO($database_connection);
            $categorias = $dao->listaCategorias();
            foreach ($categorias as $categoria) :
?>
                <option <?=$produto->getCategoria()->getId()==$categoria["id"]?'selected':'';?> value="<?=$categoria["id"];?>"><?=$categoria["nome"];?></option>
<?php
            endforeach;
?>
                </select>
            </div>
        </div>
        <hr />
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="tipoProduto">Tipo de produto:</label>
            </div>
            <div class="col-sm-10">
                <select class="form-control" name="tipoProduto" id="tipoProduto">
                    <option value="Produto" <?=(!$produto->temIsbn())?"selected":"";?>>Geral</option>
                    <optgroup label="Livro">
                        <option value="Ebook" <?=($produto->temWaterMark())?"selected":"";?>>Livro Eletrônico</option>
                        <option value="LivroFisico" <?=($produto->temTaxaImpressao())?"selected":"";?>>Livro Físico</option>
                    </optgroup>
                </select>
            </div>
        </div>
        <hr />
        <div class="form-group row isbn">
            <div class="col-sm-2">
                <label for="isbn">ISBN (quando for um livro):</label>
            </div>
            <div class="col-sm-10">
                <?php
                    $isbn = "";
                    if($produto->temIsbn()){
                        $isbn = $produto->getIsbn();
                    }
                ?>
                <input type="text" class="form-control" id="isbn" name="isbn" value="<?=$isbn?>" />
            </div>
        </div>
        <hr class="isbn" />
        <div class="form-group row watermark">
            <div class="col-sm-2">
                <label for="watermark">Watermark (quando for um ebook):</label>
            </div>
            <div class="col-sm-10">
                <?php
                    $waterMark = "";
                    if($produto->temWaterMark()){
                        $waterMark = $produto->getWaterMark();
                    }
                ?>
                <input type="text" class="form-control" id="watermark" name="waterMark" value="<?=$waterMark;?>" />
            </div>
        </div>
        <hr class="watermark" />
        <div class="form-group row taxa">
            <div class="col-sm-2">
                <label for="taxaImpressao">Taxa de impressão(quando for um um livro físico):</label>
            </div>
            <div class="col-sm-10">
                <?php
                    $taxaImpressao = "";
                    if($produto->temTaxaImpressao()){
                        $taxaImpressao = $produto->getTaxaImpressao();
                    }
                ?>
                <input type="number" class="form-control" id="taxaImpressao" name="taxaImpressao" value="<?=$taxaImpressao;?>" />
            </div>
        </div>
        <hr class="taxa" />
        <div class="row">
            <button class="btn btn-primary pull-right" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Cadastrar</button>
        </div>
    </form>
    <script src="js/campo-isbn.js"></script>
<?php
    require_once("rodape.php");
?>