<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Help Teacher</title>
    </head>
    <body>
        <h2><b>Cadastro Instituição</b></h2>
        <form method="post" action="../model/cadastro/cadastrarInstituição.php">    

            <div>
                <label for="tipo">Tipo:</label>
                <select name="tipo">
                    <option value="">Selecione</option>
                    <option value="escola">Escola</option>
                </select>
            </div> 

            <div>
                <label for="razaoSocial">Razão Social:</label>
                <input type="text" id="razaoSocial" name="razaoSocial">
            </div>   

             <div>
                <label for="nomeFantasia">Nome Fantasia:</label>
                <input type="text" id="nomeFantasia" name="nomeFantasia">
            </div>       

            <div>            
                <label for="cnpj">CNPJ:</label>
                <input type="text" id="cnpj" name="cnpj">
            </div>               

            <div>            
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade">
            </div>

            <div>            
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado">
            </div>                 

            <div>            
                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone">
            </div>                

            <div>
            <button  type="submit" name="entrar">
             Cadastrar  
            </button>
            
            <button>
            <a href="listarInstituicao.php">Listar</a>
            </button>

            <button>
            <a href="inicioAdministrador.php">Voltar</a>
            </button>
            </div>
            <br>

        </form>
    </body>
</html>