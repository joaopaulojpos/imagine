<!DOCTYPE html>
    <html lang="pt-br">
       	<head>
       		<meta charset="utf-8">
       		<title>Help Teacher</title>
       </head>
       <body>
        <?php require_once '../model/conexao.php'; ?>

        <?php if (isset($_POST['professorID'])):?>

		  <?php $professorID = $_POST['professorID'];				          
                //SQL para PESQUISAR professor escolhido por NOME
                $sql = "SELECT professorID, nome, telefone FROM professor WHERE professorID = '$professorID'";
                $query = mysqli_query($conn, $sql) or die("Falha ao buscar o professor. Erro: " . mysqli_error($conn))?>
				
				<h2><b>Resultado da Pesquisa</b></h2>
					<div>
					<table>
						<tbody>
							<thead>
								<tr>									
									<th><b>Nome</b></th>
									<th><b>Telefone</b></th>									
									<th><b>Ações</b></th>
								</tr>
							</thead>	
                
                <?php while ($row = mysqli_fetch_assoc($query)): ?>
						
							<tr>                               
								<td><?php echo $row['nome'] ?></td>
								<td><?php echo $row['telefone'] ?></td>								
								<td><a href="../model/excluir/excluirProfessor.php?professorID=<?php echo $row['professorID']; ?>"><i class="material-icons">delete</i></a>
								<a href="../view/editarProfessor.php?professorID=<?php echo $row['professorID']; ?>"><i class="material-icons">edit</i></a></td>
							</tr>
             
                <?php endwhile; ?>
						</tbody>
					</table>
					</div>
					<br/>
				<div class="row col s4 left-align">
                <a href='listarProfessor.php' class="btn waves-effect waves-light">Voltar</a>
                </div>     
			<?php else: ?>
            <?php //SQL para LISTAR os dados dos professores
            $sql = "SELECT professorID, nome, telefone FROM professor";
            $query = mysqli_query($conn, $sql) or die("Não foi possível listar os dados do professor.\n Erro: " . mysql_error($conn));?>

            <?php if (mysqli_num_rows($query) > 0):?>
                
                <h2><b>Lista de Professores</b></h2>
				<br>
				<div>
				<form method="post" action="">				
					<div>
						<label for="professorID"><b>ID Professor:</b></label>
						<input type="text" id="professorID" name="codigoProfessor"/>
						<button type="submit">Buscar</button>						
					</div>										
                </form>
				</div>
				<br/><br/> 
				<div>
				<table class="highlight">				
					<tbody>							
						<thead>
							<tr>								
								<th>Nome</th>
								<th>Telefone</th>								
								<th>Ações</th>
							</tr>							
						</thead>

                <?php while ($row = mysqli_fetch_assoc($query)): ?>
				
							<tr>								
								<td><?php echo $row['nome'] ?></td>
								<td><?php echo $row['telefone'] ?></td>								
								<td><button><a href="../model/excluir/excluirProfessor.php?professorID=<?php echo $row['professorID']; ?>">Deletar</a></button>
								<button><a href="../view/editarProfessor.php?professorID=<?php echo $row['professorID']; ?>">Editar</a></button></td>
							</tr>                        
                <?php endwhile; ?> 						
					</tbody>						
				</table>							
				<br/>
                <div class="row col s4 left-align">
				<a class="btn waves-effect waves-light" href="cadastrarProfessor.php">Voltar</a></div> 
				</div>
				<?php else:?>

                <script type='text/javascript'>alert('Não há registro de Professores no banco de dados!');location.href='cadastrarProfessor.php';</script>
				
				<?php endif?>
			<?php endif;?>
			<?php mysqli_close($conn); ?>
	</body>
</html>