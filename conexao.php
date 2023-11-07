<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db   = 'site_de_opiniao_de_filmes';

    $conexao = new mysqli($host, $user, $pass, $db);

    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    } else {

            }
?>