<?php
    /**
     * Created by PhpStorm.
     * User: claudio
     * Date: 17/06/17
     * Time: 16:14
     */
    require_once("configuracao.php");
    require_once("acesso.php");
    require_once("cabecalho.php");
?>

    <h1>Contato</h1>
    <hr />
    <form action="logica-contato.php" method="post">
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="nome">Nome:</label>
            </div>
            <div class="col-sm-10">
                <input type="text" id="nome" name="nome" class="form-control" required />
            </div>
        </div>
        <hr />
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="email">E-mail:</label>
            </div>
            <div class="col-sm-10">
                <input type="email" id="email" name="email" class="form-control" required />
            </div>
        </div>
        <hr />
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="mensagem">Mensagem:</label>
            </div>
            <div class="col-sm-10">
                <textarea id="mensagem" name="mensagem" class="form-control" rows="5"></textarea>
            </div>
        </div>
        <hr />
        <div class="row">
            <button class="btn btn-primary pull-right" type="submit">
                <span class="glyphicon glyphicon-floppy-disk"></span> Enviar
            </button>
        </div>
    </form>
<?php
    require_once("rodape.php");
?>
