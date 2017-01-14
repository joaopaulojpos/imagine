<?php
require_once '../model/conexao.php';

$sql = "SELECT id_cidade FROM cidade";
$query = mysqli_query($conn,$sql) or die("Erro: " . mysqli_error($conn));

$sql1 = "SELECT id_tipo_inst FROM tipo_instituicao";
$query1 = mysqli_query($conn,$sql1) or die("Erro: " . mysqli_error($conn));

?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Help Teacher</title>
    </head>
    <body>
        <h2><b>Cadastro Instituição</b></h2>
        <form method="post" action="../model/cadastrar/cadastrarInstituicao.php">    

            <div>            
                <label for="cnpj_inst">CNPJ:</label>
                <input type="text" id="cnpj_inst" name="cnpj_inst">
            </div>             

             <div>
                <label for="nome_inst">Nome:</label>
                <input type="text" id="nome_inst" name="nome_inst">
            </div>               

            <div>            
                <label for="logradouro_inst">Logradouro:</label>
                <input type="text" id="logradouro_inst" name="logradouro_inst">
            </div>  

            <div>            
                <label for="numero_inst">Número:</label>
                <input type="text" id="numero_inst" name="numero_inst">
            </div>

            <div>            
                <label for="complem_inst">Complemento:</label>
                <input type="text" id="complem_inst" name="complem_inst">
            </div>

            <div>            
                <label for="bairro_inst">Bairro:</label>
                <input type="text" id="bairro_inst" name="bairro_inst">
            </div>

            <div>            
                <label for="tel_inst">Telefone:</label>
                <input type="text" id="tel_inst" name="tel_inst">
            </div>

            <div>            
                <label for="email_inst">Email:</label>
                <input type="text" id="email_inst" name="email_inst">
            </div>    

            <div>            
                <label for="id_cidade">Cidade:</label>
                <select name="id_cidade">
                    <option value="" selected>Selecione</option>
                    <?php while ($row = mysqli_fetch_assoc($query)): ?>
                    <option value="<?php echo $row['id_cidade'] ?>"><?php echo $row['id_cidade'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div>            
                <label for="id_tipo_inst">Tipo:</label>
                <select name="id_tipo_inst">
                    <option value="" selected>Selecione</option>
                    <?php while ($row1 = mysqli_fetch_assoc($query1)): ?>
                    <option value="<?php echo $row1['id_tipo_inst'] ?>"><?php echo $row1['id_tipo_inst'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>         

            <div>
            <button  type="submit" name="cadastrar">
             Cadastrar  
            </button>
            
            <button>
            <a href="listarInstituicoes.php">Listar</a>
            </button>

            <button>
            <a href="inicioAdministrador.php">Voltar</a>
            </button>
            </div>
            <br>

        </form>
    </body>
</html>