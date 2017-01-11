<?php

require_once '../conexao.php';

	if(isset($_POST['professorID'])){
    $professorID = $_POST['professorID'];    
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    

	$sql = "UPDATE professor SET nome = '$nome', telefone = '$telefone' WHERE professorID = '$professorID'";
    $query = mysqli_query($conn, $sql) or die("Erro: " . mysqli_error($conn));

if($query){
	
    echo "<script type='text/javascript'>alert('Dados alterados com sucesso!');location.href='../../view/listarProfessor.php';</script>";


}else{

	echo "<script type='text/javascript'>alert('Não foi possível alterar os dados do professor!');location.href='../../view/listarProfessor.php';</script>";

}

    mysqli_close($conn);
}

?>
