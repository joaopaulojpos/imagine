<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Help Teacher</title>
    </head>
    <body>
		<form method="post" action="../model/login.php" id="formlogin">

    	    <div>
                <label for="usuarioLogin">Login</label>
                <input type="text" id="usuarioLogin" name="usuarioLogin">        
            </div>

            <div>
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha">
            </div>

            <div>
                <button type="submit" name="entrar" onclick="location.href='../model/inicio.php'">
        	    Entrar</button>	
            
    		    <button type="button"	name="cadastrese"	onclick="location.href='cadastrarUsuario.php'">
                Cadastre - Se</button>
            </div>     
             
        </form>
	</body>
</html>