<?php

require_once '../conexao.php';

if (isset($_POST['nome'])) {    
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];      

    $sql = "SELECT professorID, nome, telefone FROM professor WHERE nome = '$nome'";
    $query = mysqli_query($conn, $sql) or die("Erro: " . mysqli_error($conn));
    $row = mysqli_fetch_assoc($query);
    $id = $row['professorID'];
    $nomeProfessor = $row['nome'];
    

    /*
     * Validação dos campos vazios ou inválidos e evitando registro duplicado
    */

        if ($nome == "") {
            echo "<script type='text/javascript'>alert('Informe o nome do professor.');location.href='../../view/cadastrarProfessor.php';</script>";
        }else
            if($telefone == "") {
                echo "<script type='text/javascript'>alert('Informe o telefone do professor.');location.href='../../view/cadastrarProfessor.php';</script>";
            }else{

                //Se tudo estiver OK, insere o registro no banco de dados                
                $insert = "INSERT INTO professor(nome, telefone) VALUES('$nome', '$telefone')";
                $result = mysqli_query($conn, $insert) or die("Erro: " . mysqli_error($conn));                
            }

                if($result){               

                echo "<script type='text/javascript'>alert('Professor cadastrado com sucesso!');location.href='../../view/listarProfessor.php'</script>";
            
            } else {

                    echo "<script type='text/javascript'>alert('Não foi possível concluir o cadastro. Tente novamente.');location.href='../../view/cadastrarProfessor.php'</script>";
                }            
    mysqli_close($conn);
}