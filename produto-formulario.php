<?php
    require_once("acesso.php");
    verifica_usuario();

    require_once("conexao.php");
    require_once("banco-categoria.php");
    require_once("cabecalho.php");
?>   
    <h1>Cadastro de Produtos</h1>
    <hr />
    <form action="adiciona-produto.php" method="post">
        <div class="form-group row">
            <div class="col-sm-2"><label for="nome">Nome:</label></div>
            <div class="col-sm-10"><input type="text" id="nome" name="nome" class="form-control" /></div>
        </div>
        <hr />
        <div class="form-group row">
            <div class="col-sm-2"><label for="preco">Preço:</label></div>
            <div class="col-sm-10"><input type="number" id="preco" name="preco" class="form-control" /></div>
        </div>
        <hr />
        <div class="form-group row">
            <div class="col-sm-2"><label for="descricao">Descrição:</label></div>
            <div class="col-sm-10"><textarea id="descricao" name="descricao" class="form-control"></textarea></div>
        </div>
        <hr />
        <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="usuado" value="true" /> Usado
                    </label>
                </div>
            </div>
        </div>
        <hr />
        <div class="form-group row">
            <div class="col-sm-2"><label for="categoria">Categoria:</label></div>
            <div class="col-sm-10">
                <select name="categoria" id="categoria" class="form-control">
<?php
            $categorias = listaCategorias($database_connection);
            foreach ($categorias as $categoria) :
?>
                <option value="<?=$categoria["id"];?>"><?=$categoria["nome"];?></option>
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