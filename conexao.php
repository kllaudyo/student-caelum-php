<?php

    $database_host = "localhost";
    $database_user = "root";
    $database_password = "";
    $database_name = "loja";

    $database_connection = mysqli_connect($database_host,  $database_user, $database_password, $database_name);

    if(!$database_connection){
        echo "<div class=\"alert alert-danger\">Não foi possível estabelecer a conexão com o banco de dados</div>"; 
        die();
    }