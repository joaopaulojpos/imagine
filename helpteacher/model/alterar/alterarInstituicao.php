<?php

require_once '../conexao.php';

	if(isset($_POST['alterar'])){
    $cnpj_inst = $_POST['cnpj_inst'];    
    $nome_inst = $_POST['nome_inst'];
    $logradouro_inst = $_POST['logradouro_inst'];
    $numero_inst = $_POST['numero_inst'];
    $complem_inst = $_POST['complem_inst'];
    $bairro_inst = $_POST['bairro_inst'];
    $tel_inst = $_POST['tel_inst'];
    $email_inst = $_POST['email_inst'];
    $id_cidade = $_POST['id_cidade'];
    $id_tipo_inst = $_POST['id_tipo_inst'];
    

	$sql = "UPDATE instituicao SET cnpj_inst = '$cnpj_inst', nome_inst = '$nome_inst', logradouro_inst = '$logradouro_inst', numero_inst = '$numero_inst', complem_inst = '$complem_inst', bairro_inst = '$bairro_inst', tel_inst = '$tel_inst', email_inst = '$email_inst', id_cidade = '$id_cidade', id_tipo_inst = '$id_tipo_inst' WHERE cnpj_inst = '$cnpj_inst'";
    $query = mysqli_query($conn, $sql) or die("Erro: " . mysqli_error($conn));

if($query){
	
    echo "<script type='text/javascript'>alert('Dados alterados com sucesso!');location.href='../../view/listarInstituicoes.php';</script>";


}else{

	echo "<script type='text/javascript'>alert('Não foi possível alterar os dados do instituicao!');location.href='../../view/editarInstituicao.php';</script>";

}

    mysqli_close($conn);
}

?>