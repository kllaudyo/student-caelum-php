<?php
    require_once("acesso.php");
    verifica_usuario();

    require_once("conexao.php");
    require_once("cabecalho.php");
?>
    <h1>Formulário de Cadastro</h1>
    <hr />
    <form action="adiciona-categoria.php" method="post">
        <div class="form-group row">
            <div class="col-sm-2"><label for="nome">Nome:</label></div>
            <div class="col-sm-10"><input type="text" id="nome" name="nome" class="form-control" /></div>
        </div>
        <hr />
        <div class="row">
            <button class="btn btn-primary pull-right" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Cadastrar</button>
        </div>
    </form>
<?php
    require_once("rodape.php")
?>