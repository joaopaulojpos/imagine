<?php

require_once '../model/conexao.php';


$professorID = $_GET['professorID'];

/*
 * Retornando os dados do banco de dados para o formulário para que possam ser alterados
 */
$sql = "SELECT professorID, nome, telefone FROM Professor WHERE professorID = '$professorID'";
$query = mysqli_query($conn, $sql) or die("Não foi possível resgatar os dados do BD " . mysqli_error($conn));
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
	       
	        <input type="hidden" id="professorID" name="professorID" class="validate" value="<?php echo $row['professorID']; ?>">   

	         <div>	            
	            <label for="nome">Nome:</label>
	            <input type="text" id="nome" name="nome" value="<?php echo $row['nome'] ?>">
	        </div>     

	        <div>
	        	<label for="telefone">Telefone:</label>
	            <input type="tel" id="telefone" name="telefone" value="<?php echo $row['telefone'] ?>">	            
	        </div>	         

	        <div>
	        <button type="submit" name="alterar">
	         Alterar
	        </button>
	        
	        <button><a href="listarProfessor.php">Voltar</a>
	        </button>
	        </div>
	        <br/>	        
	        </form>	   
	</body>
</html>