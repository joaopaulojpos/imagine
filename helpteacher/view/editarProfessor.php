<?php

require_once '../model/conexao.php';


$cpf_prof = $_GET['cpf_prof'];

/*
 * Retornando os dados do banco de dados para o formulário para que possam ser alterados
 */
$sql = "SELECT cpf_prof, nome_prof, email_prof, senha_prof FROM professor WHERE cpf_prof = '$cpf_prof'";
$query = mysqli_query($conn, $sql) or die("Erro: " . mysqli_error($conn));
$row = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/style.css"/>
		<title>Help Teacher</title>
	</head>
	<body>	
		<div class="parallax"></div>
		<div class="container">
			<div class="page-header">
	        <h2><b>Editar Professor</b></h2>
	        </div>

	        <form method="POST" action="../model/alterar/alterarProfessor.php" class="form-horizontal">	       
	        <div class="row">	
	        <div class="col-xs-3">            
	            <label for="cpf_prof">CPF:</label>
	            <input type="text" class="form-control" id="cpf_prof" name="cpf_prof" value="<?php echo $row['cpf_prof'] ?>"/>
	        </div>            

	        <div class="col-xs-4">	            
	            <label for="nome_prof">Nome:</label>
	            <input type="text" class="form-control" id="nome_prof" name="nome_prof" value="<?php echo $row['nome_prof'] ?>"/>
	        </div>  
	        </div>   
	        <br/>
	        <div class="row">
	        	<div class="col-xs-3">
	        	<label for="email_prof">Telefone:</label>
	            <input type="email_prof" class="form-control" id="email_prof" name="email_prof" value="<?php echo $row['email_prof'] ?>"/>
	        </div>	

	        <div class="col-xs-4">
	        	<label for="senha_prof">Senha:</label>
	            <input type="senha_prof" class="form-control" id="senha_prof" name="senha_prof" value="<?php echo $row['senha_prof'] ?>"/>
	        </div>
	        </div>	          
	        <br/>
	        <div>
	        <button type="submit" class="btn btn-primary" name="alterar">
	        Alterar
	        </button>	        
	        <button type="button" class="btn btn-primary" name="voltar" onclick="location.href='listarProfessores.php'">
	        Voltar
	        </button>
	        </div>
	        <br/>	        
	        </form>	 
	        </div>
	        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    
        	<script type="text/javascript" src="../jquery/jquery.slim.js"></script>    
       		<script type="text/javascript" src="../js/bootstrap.js"></script>  
	</body>
</html>