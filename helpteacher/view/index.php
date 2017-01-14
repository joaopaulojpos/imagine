<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Help Teacher</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css"/>
    </head>
    <body>
        <div class="container">        
		<form class="form-signin" method="post" action="../model/login.php" id="formlogin">
            <h2 class="form-signin-heading">Help Teacher</h2>
            <br/>
            <div class="row">
    	    <div class="form-group">  
                <div class="col-md-6">          
                <label for="usuarioLogin">Login</label>                
                <input type="text" class="form-control" id="usuarioLogin" name="usuarioLogin" placeholder="">  
                </div>    
            </div>
            </div>

            <div class="row">
            <div class="form-group"> 
                <div class="col-md-6">           
                <label for="senha">Senha</label>                
                <input type="password" class="form-control" id="senha" name="senha" placeholder="">
                </div>                
            </div>
            </div>
            <br/>
            <div class="row">
            <div class="col-md-3">
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="entrar" onclick="location.href='../model/inicio.php'">
        	    Entrar</button>	
            </div>

            <div class="col-md-3">
    		    <button class="btn btn-lg btn-primary btn-block"  type="button"	name="cadastrese"	onclick="location.href='cadastrarUsuario.php'">
                Cadastre - Se</button>
            </div>
            </div>                                    
        </form> 
        </div>     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>        
        <script src="../js/bootstrap.min.js"></script>
	</body>
</html>