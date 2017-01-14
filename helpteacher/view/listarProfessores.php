<!DOCTYPE html>
    <html lang="pt-br">
       	<head>
       		<meta charset="utf-8">
       		<title>Help Teacher</title>
       </head>
       <body>
        <?php require_once '../model/conexao.php'; ?>

        <?php if (isset($_POST['cpf_prof'])):?>

		  <?php $cpf_prof = $_POST['cpf_prof'];				          
                //SQL para PESQUISAR professor escolhido por CPF
                $sql = "SELECT cpf_prof, nome_prof, email_prof, senha_prof FROM professor WHERE cpf_prof = '$cpf_prof'";
                $query = mysqli_query($conn, $sql) or die("Erro: " . mysqli_error($conn))?>
				
				<h2><b>Resultado da Pesquisa</b></h2>
					<div>
					<table>
						<tbody>
							<thead>
								<tr>									
									<th><b>CPF</b></th>
									<th><b>Nome</b></th>
									<th><b>Email</b></th>									
									<th><b>Ações</b></th>
								</tr>
							</thead>	
                
                <?php while ($row = mysqli_fetch_assoc($query)): ?>
						
							<tr>                               
								<td><?php echo $row['cpf_prof'] ?></td>
								<td><?php echo $row['nome_prof'] ?></td>
								<td><?php echo $row['email_prof'] ?></td>								
								<td><a href="../model/excluir/excluirProfessor.php?cpf_prof=<?php echo $row['cpf_prof']; ?>">Deletar</a>
								<a href="../view/editarProfessor.php?cpf_prof=<?php echo $row['cpf_prof']; ?>">Editar</a></td>
							</tr>
             
                <?php endwhile; ?>
						</tbody>
					</table>
					</div>
					<br/>
				<div >
                <a href='listarProfessores.php'>Voltar</a>
                </div>     
			<?php else: ?>
            <?php //SQL para LISTAR os dados dos professores
            $sql = "SELECT cpf_prof, nome_prof, email_prof, senha_prof FROM professor";
            $query = mysqli_query($conn, $sql) or die("Erro: " . mysql_error($conn));?>

            <?php if (mysqli_num_rows($query) > 0):?>
                
                <h2><b>Lista de Professores</b></h2>
				<br>
				<div>
				<form method="post" action="">				
					<div>
						<label for="cpf_prof"><b>CPF:</b></label>
						<input type="text" id="cpf_prof" name="cpf_prof"/>
						<button type="submit" name="buscar">Buscar</button>						
					</div>										
                </form>
				</div>
				<br/><br/> 
				<div>
				<table>				
					<tbody>							
						<thead>
							<tr>								
								<th>CPF</th>
								<th>Nome</th>
								<th>Email</th>								
								<th>Ações</th>
							</tr>							
						</thead>

                <?php while ($row = mysqli_fetch_assoc($query)): ?>
				
							<tr>								
								<td><?php echo $row['cpf_prof'] ?></td>
								<td><?php echo $row['nome_prof'] ?></td>
								<td><?php echo $row['email_prof'] ?></td>								
								<td><button><a href="../model/excluir/excluirProfessor.php?cpf_prof=<?php echo $row['cpf_prof']; ?>">Deletar</a></button>
								<button><a href="../view/editarProfessor.php?cpf_prof=<?php echo $row['cpf_prof']; ?>">Editar</a></button></td>
							</tr>                        
                <?php endwhile; ?> 						
					</tbody>						
				</table>							
				<br/>
                <div>
				<a href="cadastrarProfessor.php">Voltar</a></div> 
				</div>
				<?php else:?>

                <script type='text/javascript'>alert('Não há registro de professores no banco de dados.');location.href='cadastrarProfessor.php';</script>
				
				<?php endif?>
			<?php endif;?>
			<?php mysqli_close($conn); ?>
	</body>
</html>