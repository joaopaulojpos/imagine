<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Help Teacher</title>
    </head>
    <body>
        <h2><b>Cadastro Escola</b></h2>
        <form method="post" action="../model/cadastrar/cadastrarEscola.php">    

            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome">
            </div>       

            <div>            
                <label for="cnpj">CNPJ:</label>
                <input type="text" id="cnpj" name="cnpj">
            </div>   

            <div>            
                <label for="cidadeId">CidadeID:</label>
                <input type="text" id="cidadeId" name="cidadeId">
            </div>                

            <div>
            <button  type="submit"  name="cadastrar">
             Cadastrar  
            </button>
            
            <button>
            <a href="listarEscolas.php">Listar</a>
            </button>

            <button>
            <a href="inicioAdministrador.php">Voltar</a>
            </button>
            </div>
            <br>

        </form>
    </body>
</html>