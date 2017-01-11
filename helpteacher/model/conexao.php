<?php

$servidor = "localhost";
$usuario  = "root";
$senha    = "12345";
$banco    = "helpteacher";


/*
* Conexão com o banco de dados  pelo método MYSQLI
*/
$conn = mysqli_connect($servidor, $usuario, $senha, $banco) or die("Falha na conexão com o banco de dados. Erro: " . mysqli_connect_error());

?>