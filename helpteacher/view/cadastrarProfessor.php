<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Help Teacher</title>
    </head>
    <body>
        <h2><b>Cadastro Professor</b></h2>
        <form method="post" action="../model/cadastrar/cadastrarProfessor.php">  

            <div>
                <label for="cpf_prof">CPF:</label>
                <input type="text" id="cpf_prof" name="cpf_prof">
            </div>     

            <div>
                <label for="nome_prof">Nome:</label>
                <input type="text" id="nome_prof" name="nome_prof">
            </div>       

           <div>
                <label for="email_prof">Email:</label>
                <input type="text" id="email_prof" name="email_prof">
            </div> 

            <div>
                <label for="senha_prof">Senha:</label>
                <input type="text" id="senha_prof" name="senha_prof">
            </div>                

            <div>
            <button  type="submit"  name="cadastrar">
             Cadastrar  
            </button>
            
            <button>
            <a href="listarProfessores.php">Listar</a>
            </button>

            <button>
            <a href="inicioAdministrador.php">Voltar</a>
            </button>
            </div>
            <br>

        </form>
    </body>
</html>