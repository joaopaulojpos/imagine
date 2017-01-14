<!DOCTYPE html>
    <html lang="pt-br">
       	<head>
       		<meta charset="utf-8">
       		<title>Help Teacher</title>
       </head>
       <body>
        <?php require_once '../model/conexao.php'; ?>

        <?php if (isset($_POST['cnpj'])):?>

		  <?php $cnpj = $_POST['cnpj'];				          
                //SQL para PESQUISAR escola escolhido por CNPJ
                $sql = "SELECT nome, cnpj, cidadeID FROM escola WHERE cnpj = '$cnpj'";
                $query = mysqli_query($conn, $sql) or die("Escola não encontrada. Erro: " . mysqli_error($conn))?>
				
				<h2><b>Resultado da Pesquisa</b></h2>
					<div>
					<table>
						<tbody>
							<thead>
								<tr>									
									<th><b>Nome</b></th>
									<th><b>CNPJ</b></th>									
									<th><b>Cidade</b></th>
								</tr>
							</thead>	
                
                <?php while ($row = mysqli_fetch_assoc($query)): ?>
						
							<tr>                               
								<td><?php echo $row['nome'] ?></td>
								<td><?php echo $row['cnpj'] ?></td>
								<td><?php echo $row['cidadeID'] ?></td>								
								<td><a href="../model/excluir/excluirEscola.php?cnpj=<?php echo $row['cnpj']; ?>">Deletar</a>
								<a href="../view/editarEscola.php?cnpj=<?php echo $row['cnpj']; ?>">Editar</a></td>
							</tr>
             
                <?php endwhile; ?>
						</tbody>
					</table>
					</div>
					<br/>
				<div>
                <a href='listarEscolas.php'>Voltar</a>
                </div>     
			<?php else: ?>
            <?php //SQL para LISTAR os dados das ESCOLAS
            $sql = "SELECT nome, cnpj, cidadeID FROM escola";
            $query = mysqli_query($conn, $sql) or die("Não foi possível listar os dados da escola.\n Erro: " . mysql_error($conn));?>

            <?php if (mysqli_num_rows($query) > 0):?>
                
                <h2><b>Lista de Escolas</b></h2>
				<br>
				<div>
				<form method="post" action="">				
					<div>
						<label for="cnpj"><b>CNPJ:</b></label>
						<input type="text" id="cnpj" name="cnpj"/>
						<button type="submit" name="buscar">Buscar</button>						
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
								<th>CNPJ</th>
								<th>Cidade</th>								
								<th>Ações</th>
							</tr>							
						</thead>

                <?php while ($row = mysqli_fetch_assoc($query)): ?>
				
							<tr>								
								<td><?php echo $row['nome'] ?></td>
								<td><?php echo $row['cnpj'] ?></td>
								<td><?php echo $row['cidadeID'] ?></td>										
								<td><button><a href="../model/excluir/excluirEscola.php?cnpj=<?php echo $row['cnpj']; ?>">Deletar</a></button>
								<button><a href="../view/editarEscola.php?cnpj=<?php echo $row['cnpj']; ?>">Editar</a></button></td>
							</tr>                        
                <?php endwhile; ?> 						
					</tbody>						
				</table>							
				<br/>
                <div>
				<a href="cadastrarEscola.php">Voltar</a></div> 
				</div>
				<?php else:?>

                <script type='text/javascript'>alert('Não há registro de escolas no banco de dados.');location.href='cadastrarEscola.php';</script>
				
				<?php endif?>
			<?php endif;?>
			<?php mysqli_close($conn); ?>
	</body>
</html>