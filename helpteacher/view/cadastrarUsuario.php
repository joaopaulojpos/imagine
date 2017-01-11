<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Help Teacher</title>
	</head>
	<body>
        <h2>Cadastro Usuário</h2>

        <form method="post" action="../model/cadastrar/cadastrarUsuario.php">

        <div>
        	<label for="codigoTipoUsuario">Tipo:</label>
        	<input type="number" min="1" max="2" id="codigoTipoUsuario" name="codigoTipoUsuario">        	      
        </div>

        <div>
        	<label for="usuarioLogin">Login:</label>
            <input type="text" id="usuarioLogin" name="usuarioLogin">            
        </div>

         <div>
         	<label for="senha">Senha:</label>
        	<input id="senha" type="password" name="senha">        	
         </div>

        <div>
        	<label for="confirmarSenha">Confirmar:</label>
        	<input type="password" id="confirmarSenha" name="confirmarSenha">
        	
         </div>

        <div>
        	<button type="submit" name="entrar">
        	 Cadastrar  
        	</button>                 
        
        	<button type="button" onclick="location.href='../view/index.php'"">
        	Voltar
        	</button>
        </div>
        </form>
   </body>
</html>