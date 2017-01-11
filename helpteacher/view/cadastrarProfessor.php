<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Help Teacher</title>
    </head>
    <body>
        <h2><b>Cadastro Professor</b></h2>
        <form method="post" action="../model/cadastro/cadastrarProfessor.php">    

            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome">
            </div>       

            <div>            
                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone">
            </div>                

            <div>
            <button  type="submit"  name="entrar">
             Cadastrar  
            </button>
            
            <button>
            <a href="listarProfessor.php">Listar</a>
            </button>

            <button>
            <a href="inicioAdministrador.php">Voltar</a>
            </button>
            </div>
            <br>

        </form>
    </body>
</html>