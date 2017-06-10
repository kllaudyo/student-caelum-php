<?php
    require_once("configuracao.php");
    require_once("acesso.php");
    verifica_usuario();
    require_once("conexao.php");
    require_once("Produto.php");
    require_once("Categoria.php");
    require_once("ProdutoDAO.php");
    require_once("CategoriaDAO.php");
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
                <textarea id="descricao" name="descricao" class="form-control"><?=$produto->getDescricao();?></textarea>
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
        <div class="row">
            <button class="btn btn-primary pull-right" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Cadastrar</button>
        </div>
    </form>
<?php
    require_once("rodape.php");
?>