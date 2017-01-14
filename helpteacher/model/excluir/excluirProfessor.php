<?php

require_once '../conexao.php';

$cpf_prof = $_GET['cpf_prof'];

$sql = "DELETE FROM professor WHERE cpf_prof = '$cpf_prof'";
$query = mysqli_query($conn, $sql) or die("Erro: " . mysqli_error($conn));

if ($query) {

    echo "<script type='text/javascript'>alert('Dados excluídos com sucesso!');location.href='../../view/listarProfessores.php';</script>";
    
} else {

    echo "<script type='text/javascript'>alert('Não foi possível excluir o registro');location.href='../../view/listarProfessores.php';</script>";
}
mysqli_close($conn);
?>
