<?php 

    require_once("cabecalho.php");
    require_once("conexao.php");
    require_once("banco-produto.php");

?>
    <h1>Lista de Produtos</h1>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <th>Id</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Ações</th>
        </thead>
        <tbody>
<?php
    $produtos = listaProdutos($database_connection);
    foreach($produtos as $produto){
?>
    <tr>
        <td><?=$produto["id"]?></td>
        <td><?=$produto["nome"]?></td>
        <td><?=$produto["preco"]?></td>
        <td><a href="remove-produto.php?id=<?=$produto["id"]?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Remover</a></td>
    </tr>
<?php           
    }
?>
        </tbody>
    </table>
<?php
    require_once("rodape.php");
?>