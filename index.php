<?php
require_once("acesso.php");
    require_once("cabecalho.php");
    require_once("bootstrap.php");

    h1("Bem vindo!");

    // == converte $_GET["login"] em boolean
    // === não converteria, apenas compararia tipo e valor
    if(isset($_GET["login"]) && $_GET["login"]==false)
    {
        alert_danger("Login inválido!");
    }

    if(isset($_GET["falhaDeSeguranca"]) && $_GET["falhaDeSeguranca"]==true){
        alert_danger("Você não tem acesso a essa funcionalidade");
    }

    h2("Login");

?>
    <hr />
    <form action="logica-login.php" method="post">
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="email">Email:</label>
            </div>
            <div class="col-sm-10">
                <input type="text" name="email" id="email" class="form-control" value="<?=$_COOKIE["login"] ?? ''?>" />
            </div>
        </div>
        <hr />
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="senha">Senha</label>
            </div>
            <div class="col-sm-10">
                <input type="password" name="senha" id="senha" class="form-control" />
            </div>
        </div>
        <hr />
        <div class="form-group">
            <button class="btn btn-primary pull-right">Login</button>
        </div>
    </form>
<?php
    require_once("rodape.php");
?>