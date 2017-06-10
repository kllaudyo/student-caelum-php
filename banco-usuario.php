<?php

    function buscarUsuario($database_connection, $login, $senha)
    {
        $database_query = "select * 
                             from usuarios 
                            where login = '{$login}' 
                              and senha = '{$senha}' 
                              ";
        $database_result = mysqli_query($database_connection, $database_query);
        return mysqli_fetch_assoc($database_result);
    }