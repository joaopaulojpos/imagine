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
		<title>Help Teacher</title>
	</head>
	<body>	
	        <h2><b>Alterar Professor</b></h2>

	        <form method="POST" action="../model/alterar/alterarProfessor.php">
	       
	        <div>	            
	            <label for="cpf_prof">CPF:</label>
	            <input type="text" id="cpf_prof" name="cpf_prof" value="<?php echo $row['cpf_prof'] ?>">
	        </div>   
	          

	        <div>	            
	            <label for="nome_prof">Nome:</label>
	            <input type="text" id="nome_prof" name="nome_prof" value="<?php echo $row['nome_prof'] ?>">
	        </div>     

	        <div>
	        	<label for="email_prof">Telefone:</label>
	            <input type="email_prof" id="email_prof" name="email_prof" value="<?php echo $row['email_prof'] ?>">	            
	        </div>	

	        <div>
	        	<label for="senha_prof">Senha:</label>
	            <input type="senha_prof" id="senha_prof" name="senha_prof" value="<?php echo $row['senha_prof'] ?>">	            
	        </div>	          

	        <div>
	        <button type="submit" name="alterar">
	         Alterar
	        </button>
	        
	        <button><a href="listarProfessores.php">Voltar</a>
	        </button>
	        </div>
	        <br/>	        
	        </form>	   
	</body>
</html>