<?php

require_once '../conexao.php';

$professorID = $_GET['professorID'];

$sql = "DELETE FROM professor WHERE professorID = '$professorID'";
$query = mysqli_query($conn, $sql) or die("Não foi possível excluir o registro " . mysqli_error($conn));

if ($query) {

    echo "<script type='text/javascript'>alert('Dados excluídos com sucesso!');location.href='../../view/listarProfessor.php';</script>";
    
} else {

    echo "<script type='text/javascript'>alert('Não foi possível excluir o registro');location.href='../../view/listarProfessor.php';</script>";
}
mysqli_close($conn);
?>
