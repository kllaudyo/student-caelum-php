<?php

    require_once("configuracao.php");
    require_once("acesso.php");
    verifica_usuario();

    require_once("cabecalho.php");
    require_once("conexao.php");
    require_once("Produto.php");
    require_once("Categoria.php");
    require_once("ProdutoDAO.php");
    require_once("bootstrap.php");

    $dao = new ProdutoDAO($database_connection);
    $produtos = $dao->listaProdutos();
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
            <th>C/ Desconto</th>
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
        <td><?=$produto->getId();?></td>
        <td><?=$produto->getNome();?></td>
        <td><?=$produto->getPreco();?></td>
        <td><?=$produto->precoComDesconto();?></td>
        <td><?=substr($produto->getDescricao(),0,30);?></td>
        <td><?=$produto->getCategoria()->getNome();?></td>
        <td><?=$produto->getUsado()==1?"Sim":"Não";?></td>
        <td>
            <a href="produto-formulario.php?id=<?=$produto->getId();?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</a>
            <form action="remove-produto.php" method="post">
                <input type="hidden" name="id" value="<?=$produto->getId()?>">
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