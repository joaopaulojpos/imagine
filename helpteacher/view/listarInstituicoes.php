<!DOCTYPE html>
    <html lang="pt-br">
       	<head>
       		<meta charset="utf-8">
       		<title>Help Teacher</title>
       </head>
       <body>
        <?php require_once '../model/conexao.php'; ?>

        <?php if (isset($_POST['cnpj_inst'])):?>

		  <?php $cnpj_inst = $_POST['cnpj_inst'];				          
                //SQL para PESQUISAR instituição escolhida por CNPJ
                $sql = "SELECT cnpj_inst, nome_inst, tel_inst, email_inst FROM instituicao WHERE cnpj_inst = '$cnpj_inst'";
                $query = mysqli_query($conn, $sql) or die("Erro: " . mysqli_error($conn))?>
				
				<h2><b>Resultado da Pesquisa</b></h2>
					<div>
					<table>
						<tbody>
							<thead>
								<tr>									
									<th><b>CNPJ</b></th>
									<th><b>Nome</b></th>
									<th><b>Telefone</b></th>									
									<th><b>Email</b></th>
									<th><td>Ações</td></th>
								</tr>
							</thead>	
                
                <?php while ($row = mysqli_fetch_assoc($query)): ?>
						
							<tr>                               
								<td><?php echo $row['cnpj_inst'] ?></td>
								<td><?php echo $row['nome_inst'] ?></td>
								<td><?php echo $row['tel_inst'] ?></td>
								<td><?php echo $row['email_inst'] ?></td>								
								<td><a href="../model/excluir/excluirInstituicao.php?cnpj_inst=<?php echo $row['cnpj_inst']; ?>">Deletar</a>
								<a href="../view/editarInstituicao.php?cnpj_inst=<?php echo $row['cnpj_inst']; ?>">Editar</a></td>
							</tr>
             
                <?php endwhile; ?>
						</tbody>
					</table>
					</div>
					<br/>
				<div >
                <a href='listarInstituicoes.php'>Voltar</a>
                </div>     
			<?php else: ?>
            <?php //SQL para LISTAR os dados das instituições
            $sql = "SELECT cnpj_inst, nome_inst, tel_inst, email_inst FROM instituicao";
            $query = mysqli_query($conn, $sql) or die("Erro: " . mysql_error($conn));?>

            <?php if (mysqli_num_rows($query) > 0):?>
                
                <h2><b>Lista de Instituições</b></h2>
				<br>
				<div>
				<form method="post" action="">				
					<div>
						<label for="cnpj_inst"><b>CNPJ:</b></label>
						<input type="text" id="cnpj_inst" name="cnpj_inst"/>
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
								<th>CNPJ</th>
								<th>Nome</th>
								<th>Telefone</th>
								<th>Email</th>								
								<th>Ações</th>
							</tr>							
						</thead>

                <?php while ($row = mysqli_fetch_assoc($query)): ?>
				
							<tr>								
								<td><?php echo $row['cnpj_inst'] ?></td>
								<td><?php echo $row['nome_inst'] ?></td>
								<td><?php echo $row['tel_inst'] ?></td>
								<td><?php echo $row['email_inst'] ?></td>								
								<td><button><a href="../model/excluir/excluirInstituicao.php?cnpj_inst=<?php echo $row['cnpj_inst']; ?>">Deletar</a></button>
								<button><a href="../view/editarInstituicao.php?cnpj_inst=<?php echo $row['cnpj_inst']; ?>">Editar</a></button></td>
							</tr>                        
                <?php endwhile; ?> 						
					</tbody>						
				</table>							
				<br/>
                <div>
				<a href="cadastrarInstituicao.php">Voltar</a></div> 
				</div>
				<?php else:?>

                <script type='text/javascript'>alert('Não há registro de instituições no banco de dados.');location.href='cadastrarInstituicao.php';</script>
				
				<?php endif?>
			<?php endif;?>
			<?php mysqli_close($conn); ?>
	</body>
</html>