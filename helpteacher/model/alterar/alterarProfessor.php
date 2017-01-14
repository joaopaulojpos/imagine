<?php

require_once '../conexao.php';

	if(isset($_POST['alterar'])){
    $cpf_prof = $_POST['cpf_prof'];    
    $nome_prof = $_POST['nome_prof'];
    $email_prof = $_POST['email_prof'];
    $senha_prof = $_POST['senha_prof'];
    

	$sql = "UPDATE professor SET cpf_prof = '$cpf_prof', nome_prof = '$nome_prof', email_prof = '$email_prof', senha_prof = '$senha_prof' WHERE cpf_prof = '$cpf_prof'";
    $query = mysqli_query($conn, $sql) or die("Erro: " . mysqli_error($conn));

if($query){
	
    echo "<script type='text/javascript'>alert('Dados alterados com sucesso!');location.href='../../view/listarProfessores.php';</script>";


}else{

	echo "<script type='text/javascript'>alert('Não foi possível alterar os dados do professor!');location.href='../../view/editarProfessor.php';</script>";

}

    mysqli_close($conn);
}

?>
