<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/style.css"/>
        <title>Help Teacher</title>
    </head>
    <body>
        <div class="parallax-prof"></div>
        <div class="container">      
        <div class="page-header">  
        <h1><b>Cadastro Professor</b></h1>
        </div>
        <form method="post" action="../model/cadastrar/cadastrarProfessor.php"> 
            <div class="row">
            <div class="col-xs-3">
                <label for="cpf_prof">CPF:</label>
                <input type="text" class="form-control" id="cpf_prof" name="cpf_prof">
            </div>                 

            <div class="col-xs-6">
                <label for="nome_prof">Nome:</label>
                <input type="text" class="form-control" id="nome_prof" name="nome_prof">
            </div> 
            </div>          

            <div class="row">
            <div class="col-xs-3">
                <label for="senha_prof">Senha:</label>
                <input type="text" class="form-control" id="senha_prof" name="senha_prof">
            </div>  

            <div class="col-xs-6">
                <label for="email_prof">Email:</label>
                <input type="text" class="form-control" id="email_prof" name="email_prof">
            </div>             
            </div>  
            <br/><br/>
            <div>
            <button  type="submit" class="btn btn-primary"  name="cadastrar">
             Cadastrar  
            </button>
            
            <button type="button" class="btn btn-primary" name="listar" onclick="location.href='listarProfessores.php'">
            Listar
            </button>

            <button type="button" class="btn btn-primary" name="voltar" onclick="location.href='inicioAdministrador.php'">
            Voltar
            </button>
            </div>
            <br>
        </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    
        <script type="text/javascript" src="../jquery/jquery.slim.js"></script>    
        <script type="text/javascript" src="../js/bootstrap.js"></script>
    </body>
</html>