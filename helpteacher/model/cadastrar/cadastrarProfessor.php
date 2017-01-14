<?php

require_once '../conexao.php';

if (isset($_POST['cadastrar'])) { 
    $cpf_prof = $_POST['cpf_prof'];   
    $nome_prof = $_POST['nome_prof'];
    $email_prof = $_POST['email_prof'];
    $senha_prof = $_POST['senha_prof'];

    $sql = "SELECT cpf_prof FROM professor WHERE cpf_prof = '$cpf_prof'";
    $query = mysqli_query($conn, $sql) or die("Erro: " . mysqli_error($conn));
    $row = mysqli_fetch_assoc($query);
    $cpf = $row['cpf_prof'];   

    /*
     * Validação dos campos vazios ou inválidos e evitando registro duplicado
    */

        if ($cpf_prof == "") {
            echo "<script type='text/javascript'>alert('Informe o cpf do professor.');location.href='../../view/cadastrarProfessor.php';</script>";

            }else
            if(strlen($cpf_prof) < 11 || strlen($cpf_prof) > 11) {
                echo "<script type='text/javascript'>alert('O cpf deve conter 11 digitos.');location.href='../../view/cadastrarProfessor.php';</script>";

                }else
                    if($cpf_prof == $cpf) {
                        echo "<script type='text/javascript'>alert('O cpf informado já encontra-se cadastrado.');location.href='../../view/cadastrarProfessor.php';</script>";

                    }else
                        if($nome_prof == "") {
                        echo "<script type='text/javascript'>alert('O campo NOME deve ser preenchido.');location.href='../../view/cadastrarProfessor.php';</script>";

                    }else
                        if($email_prof == "") {
                        echo "<script type='text/javascript'>alert('O campo EMAIL deve ser preenchido.');location.href='../../view/cadastrarProfessor.php';</script>";

                    }else
                        if($senha_prof == "") {
                        echo "<script type='text/javascript'>alert('O campo SENHA deve ser preenchido.');location.href='../../view/cadastrarProfessor.php';</script>";

                    }else{

                        //Se tudo estiver OK, insere o registro no banco de dados                
                        $insert = "INSERT INTO professor(cpf_prof, nome_prof, email_prof, senha_prof) VALUES('$cpf_prof', '$nome_prof', '$email_prof', '$senha_prof')";
                        $result = mysqli_query($conn, $insert) or die("Erro: " . mysqli_error($conn));                
                    }

                        if($result){               

                        echo "<script type='text/javascript'>alert('Professor cadastrado com sucesso!');location.href='../../view/listarProfessores.php'</script>";
                    
                    } else {

                            echo "<script type='text/javascript'>alert('Não foi possível concluir o cadastro. Tente novamente.');location.href='../../view/cadastrarProfessor.php'</script>";
                        }            
    mysqli_close($conn);
}