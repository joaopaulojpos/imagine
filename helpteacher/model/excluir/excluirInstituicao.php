<?php

require_once '../conexao.php';

$cnpj_inst = $_GET['cnpj_inst'];

$sql = "DELETE FROM instituicao WHERE cnpj_inst = '$cnpj_inst'";
$query = mysqli_query($conn, $sql) or die("Erro: " . mysqli_error($conn));

if ($query) {

    echo "<script type='text/javascript'>alert('Dados excluídos com sucesso!');location.href='../../view/listarInstituicoes.php';</script>";
    
} else {

    echo "<script type='text/javascript'>alert('Não foi possível excluir o registro');location.href='../../view/listarinstituicoes.php';</script>";
}
mysqli_close($conn);
?>
