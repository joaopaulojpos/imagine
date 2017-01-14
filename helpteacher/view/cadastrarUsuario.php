<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/style.css"/>
		<title>Help Teacher</title>
	</head>
	<body>
        <div class="parallax-cdu"></div>
        <div class="container">     
         
        <h1 id="hd-cdu">Cadastro Usuário</h1>
        <hr class="hr-login" />
        <form method="post" action="../model/cadastrar/cadastrarUsuario.php" id="formlogin">

        <div class="row">
        <div class="col-xs-6">
        	<label for="codigoTipoUsuario">Tipo:</label>
        	<input type="number" class="form-control" min="1" max="2" id="codigoTipoUsuario" name="codigoTipoUsuario">        	      
        </div>
        </div>
        <p>
         1-Administrador
         2-Professor
        </p>

        <div class="row">
        <div class="col-xs-6">
        	<label for="usuarioLogin">Login:</label>
            <input type="text" class="form-control" id="usuarioLogin" name="usuarioLogin">            
        </div>
        </div>

         <div class="row">
         <div class="col-xs-6">
         	<label for="senha">Senha:</label>
        	<input type="password" class="form-control" id="senha" name="senha">        	
         </div>
         </div>

        <div class="row">
        <div class="col-xs-6">
        	<label for="confirmarSenha">Confirmar:</label>
        	<input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha">        	
         </div>
         </div>
         <br/>
        <div>
        	<button type="submit" class="btn btn-primary" name="entrar">
        	 Cadastrar  
        	</button>                 
        
        	<button type="button" class="btn btn-primary" onclick="location.href='../view/index.php'"">
        	Voltar
        	</button>
        </div>
        </form>
        <br/><br/>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    
        <script type="text/javascript" src="../jquery/jquery.slim.js"></script>    
        <script type="text/javascript" src="../js/bootstrap.js"></script>
   </body>
</html>