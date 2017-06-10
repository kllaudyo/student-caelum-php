<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Minha Loja</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/loja.css">
</head>
<body>
    <main class="container">
    <nav class="navbar navbar-inverse ">
        <div class="container">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Minha Loja</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Produtos<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="produto-lista.php">Lista produtos</a></li>
                            <li><a href="produto-formulario.php">Adiciona produto</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="categoria-formulario.php">Adiciona Categoria</a></li>
                        </ul>
                    </li>
                </ul>
                <?php if(usuario_esta_logado()):?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" class="active">Bem vindo <strong><?=usuario_logado();?></strong></a></li>
                        <li><a href="logout.php">Sair</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        </div>
    </nav>  

        <section class="principal">