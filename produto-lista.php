<?php

    require_once("acesso.php");
    verifica_usuario();

    require_once("cabecalho.php");
    require_once("conexao.php");
    require_once("banco-produto.php");
    require_once("bootstrap.php");

    $produtos = listaProdutos($database_connection);
    $usuario = usuario_logado();

    h1("Lista de Produtos");

    if(isset($_GET["excluido"]))
    {
        alert_success("Produto excluído com sucesso!");
    }

?>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <th>Id</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th>Categoria</th>
            <th>Usado</th>
            <th>Ações</th>
        </thead>
        <tbody>
<?php

    foreach($produtos as $produto):
?>
    <tr>
        <td><?=$produto["id"]?></td>
        <td><?=$produto["nome"]?></td>
        <td><?=$produto["preco"]?></td>
        <td><?=substr($produto["descricao"],0,30);?></td>
        <td><?=$produto["categoria_nome"];?></td>
        <td><?=$produto["usado"]==1?"Sim":"Não";?></td>
        <td>
            <form action="remove-produto.php" method="post">
                <input type="hidden" name="id" value="<?=$produto["id"]?>">
                <button type="submit" class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash"></span> Remover
                </button>
            </form>
        </td>
    </tr>
<?php           
    endforeach;
?>
        </tbody>
    </table>
<?php
    require_once("rodape.php");
?>