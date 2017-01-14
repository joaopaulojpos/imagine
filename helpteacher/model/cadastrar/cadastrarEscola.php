<?php

require_once '../conexao.php';

if (isset($_POST['cadastrar'])) {    
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $cidadeID = $_POST['cidadeID'];  

    $sql = "SELECT nome, cnpj, cidadeID FROM escola WHERE cnpj = '$cnpj'";
    $query = mysqli_query($conn, $sql) or die("Erro: " . mysqli_error($conn));
    $row = mysqli_fetch_assoc($query);   
    $cnpjEscola = $row['cnpj'];    

    $sql1 = "SELECT cidadeID FROM cidade WHERE cidadeID = '$cidadeID'";
    $query1 = mysqli_query($conn,$sql1) or die('Erro: ' . mysqli_error($conn));
    $row1 = mysqli_fetch_assoc($query1);
    $cidade = $row1['cidadeID'];   

    /*
     * Validação dos campos vazios ou inválidos e evitando registro duplicado
    */

        if ($nome == "") {

            echo "<script type='text/javascript'>alert('O campo NOME deve ser preenchido.');location.href='../../view/cadastrarEscola.php';</script>";
        }else
            if($cnpj == ""){

                    echo "<script type='text/javascript'>alert('O campo CNPJ deve ser preenchido.');location.href='../../view/cadastrarEscola.php';</script>";
                }else
                    if($cnpj == $cnpjEscola){

                        echo "<script type='text/javascript'>alert('A escola informada já encontra-se cadastrada.');location.href='../../view/listarEscolas.php';</script>";

                    }else
                        if($cidadeID == ""){

                            echo "<script type='text/javascript'>alert('Informe a cidade da escola que deseja cadastrar.');location.href='../../view/cadastrarEscola.php';</script>";
                        }else
                            if($cidade == null){

                                echo "<script type='text/javascript'>alert('A cidade informada não encontra-se cadastrada.');location.href='../../view/cadastrarEscola.php';</script>";

                            }else{

                //Se tudo estiver OK, insere o registro no banco de dados                
                $insert = "INSERT INTO escola(nome, cnpj, cidadeID) VALUES('$nome', '$cnpj', '$cidadeID')";
                $result = mysqli_query($conn, $insert) or die("Erro: " . mysqli_error($conn));                
            }

                if($result){               

                echo "<script type='text/javascript'>alert('Escola cadastrada com sucesso!');location.href='../../view/listarEscolas.php'</script>";
            
            } else {

                    echo "<script type='text/javascript'>alert('Não foi possível concluir o cadastro. Tente novamente.');location.href='../../view/cadastrarEscola.php'</script>";
                }           
    mysqli_close($conn);
}