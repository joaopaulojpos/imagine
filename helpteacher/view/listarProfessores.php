<!DOCTYPE html>
    <html lang="pt-br">
       	<head>
       		<meta charset="utf-8">
       		<meta http-equiv="X-UA-Compatible" content="IE-edge">
        	<meta name="viewport" content="width=device-width, initial-scale=1">
        	<link rel="stylesheet" href="../css/bootstrap.css">
        	<link rel="stylesheet" href="../css/style.css">
       		<title>Help Teacher</title>
       </head>
       <body>
       <div class="parallax"></div>
       <div class="container theme-showcase" role="main">
        <?php require_once '../model/conexao.php'; ?>

        <?php if (isset($_POST['cpf_prof'])):?>

		  <?php $cpf_prof = $_POST['cpf_prof'];				          
                //SQL para PESQUISAR professor escolhido por CPF
                $sql = "SELECT cpf_prof, nome_prof, email_prof, senha_prof FROM professor WHERE cpf_prof = '$cpf_prof'";
                $query = mysqli_query($conn, $sql) or die("Erro: " . mysqli_error($conn))?>
				
				<h2><b>Resultado da Pesquisa</b></h2>
					<div>
					<table class="table table-responsive">
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
								<td><a href="../model/excluir/excluirProfessor.php?cpf_prof=<?php echo $row['cpf_prof']; ?>"><span class="glyphicon glyphicon-trash text-danger" aria-hidden="true"></span></a>
								<a href="../view/editarProfessor.php?cpf_prof=<?php echo $row['cpf_prof']; ?>"><span class="glyphicon glyphicon-pencil text-primary" aria-hidden="true"></span></a></td>
							</tr>
             
                <?php endwhile; ?>
						</tbody>
					</table>
					</div>
					<br/>
				<div >                
				<button type="button" class="btn btn-primary" onclick="location.href='listarProfessores.php'">
				Voltar
				</button>				
                </div>     
			<?php else: ?>
            <?php //SQL para LISTAR os dados dos professores
            $sql = "SELECT cpf_prof, nome_prof, email_prof, senha_prof FROM professor";
            $query = mysqli_query($conn, $sql) or die("Erro: " . mysql_error($conn));?>
            <?php if (mysqli_num_rows($query) > 0):?>
                <h2><b>Lista de Professores</b></h2>                
				<br>
				<div>
				<form method="post" action="" class="form-horizontal">				
					<div class="form-group">
                		<div class="pull-left">
							<label for="cpf_prof" class="control-label col-sm-2"><b>Pesquisar:</b></label>
						</div>
						<div class="col-sm-4">
                    	<div class="input-group">
							<input type="text" class="form-control" id="cpf_prof" name="cpf_prof" placeholder="Informe o CPF" />
								<div class="input-group-btn">
                            		<button class="btn btn-default" type="submit">
                                	<i class="glyphicon glyphicon-search text-primary"></i>
                           			 </button>
                       			 </div>						
						</div>	
						</div>
						</div>	
                </form>
				</div>
				<div>
				<table class="table table-responsive">			
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
								<td><a href="../model/excluir/excluirProfessor.php?cpf_prof=<?php echo $row['cpf_prof']; ?>"><span class="glyphicon glyphicon-trash text-danger" aria-hidden="true"></span></a>
								<a href="../view/editarProfessor.php?cpf_prof=<?php echo $row['cpf_prof']; ?>"><span class="glyphicon glyphicon-pencil text-primary" aria-hidden="true"></span></a></td>
							</tr>                        
                <?php endwhile; ?> 						
					</tbody>						
				</table>							
				<br/>
                <div>
				<button type="button" class="btn btn-primary" onclick="location.href='cadastrarProfessor.php'">
				Voltar
				</button>
				</div> 
				</div>
				<?php else:?>

                <script type='text/javascript'>alert('Não há registro de professores no banco de dados.');location.href='cadastrarProfessor.php';</script>
				
				<?php endif?>
			<?php endif;?>
			<?php mysqli_close($conn); ?>
			</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="../jquery/jquery.slim.js"></script>
        <script type="text/javascript" scr="../js/bootstrap.js"></script>
	</body>
</html>