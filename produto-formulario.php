<?php 
    require_once("cabecalho.php");
?>   
    <h1>Formulário de Cadastro</h1>
    <form action="adiciona-produto.php">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" />
        </div>
        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" />
        </div>
        <input type="submit" value="Cadastrar" class="btn btn-primary" />
    </form>
    
<?php 
    require_once("rodape.php");
?>