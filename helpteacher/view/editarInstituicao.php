<?php

require_once '../model/conexao.php';


$cnpj_inst = $_GET['cnpj_inst'];

/*
 * Retornando os dados do banco de dados para o formulário para que possam ser alterados
 */
$sql = "SELECT cnpj_inst, nome_inst, logradouro_inst, numero_inst, complem_inst, bairro_inst, tel_inst, email_inst, id_cidade, id_tipo_inst FROM instituicao WHERE cnpj_inst = '$cnpj_inst'";
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
	        <h2><b>Alterar Instituição</b></h2>

	        <form method="POST" action="../model/alterar/alterarInstituicao.php">
	       
	        <div>	            
	            <label for="cnpj_inst">CNPJ:</label>
	            <input type="text" id="cnpj_inst" name="cnpj_inst" value="<?php echo $row['cnpj_inst'] ?>">
	        </div>   
	          

	        <div>	            
	            <label for="nome_inst">Nome:</label>
	            <input type="text" id="nome_inst" name="nome_inst" value="<?php echo $row['nome_inst'] ?>">
	        </div>     

	        <div>
	        	<label for="logradouro_inst">Logradouro:</label>
	            <input type="logradouro_inst" id="logradouro_inst" name="logradouro_inst" value="<?php echo $row['logradouro_inst'] ?>">
	        </div>	

	        <div>
	        	<label for="numero_inst">Número:</label>
	            <input type="numero_inst" id="numero_inst" name="numero_inst" value="<?php echo $row['numero_inst'] ?>">	            
	        </div>	

	        <div>	            
	            <label for="complem_inst">Complemento:</label>
	            <input type="text" id="complem_inst" name="complem_inst" value="<?php echo $row['complem_inst'] ?>">
	        </div>   	          

	        <div>	            
	            <label for="bairro_inst">Bairro:</label>
	            <input type="text" id="bairro_inst" name="bairro_inst" value="<?php echo $row['bairro_inst'] ?>">
	        </div>   

	        <div>	            
	            <label for="tel_inst">Telefone:</label>
	            <input type="text" id="tel_inst" name="tel_inst" value="<?php echo $row['tel_inst'] ?>">
	        </div>

	        <div>	            
	            <label for="email_inst">Email:</label>
	            <input type="text" id="email_inst" name="email_inst" value="<?php echo $row['email_inst'] ?>">
	        </div>

	        <div>	            
	            <label for="id_cidade">Cidade:</label>
	            <input type="text" id="id_cidade" name="id_cidade" value="<?php echo $row['id_cidade'] ?>">
	        </div>

	        <div>	            
	            <label for="id_tipo_inst">Tipo:</label>
	            <input type="text" id="id_tipo_inst" name="id_tipo_inst" value="<?php echo $row['id_tipo_inst'] ?>">
	        </div>

	        <div>
	        <button type="submit" name="alterar">
	         Alterar
	        </button>
	        
	        <button><a href="listarInstituicoes.php">Voltar</a>
	        </button>
	        </div>
	        <br/>	        
	        </form>	   
	</body>
</html>