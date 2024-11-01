<?php

$dbHost = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName = "cupcake_mania"; 


$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);


if ($conexao->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
}
?>
