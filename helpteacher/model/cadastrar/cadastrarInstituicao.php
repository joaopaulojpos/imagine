<?php

require_once '../conexao.php';

if (isset($_POST['cadastrar'])) { 
    $cnpj_inst = $_POST['cnpj_inst'];   
    $nome_inst = $_POST['nome_inst'];
    $logradouro_inst = $_POST['logradouro_inst'];
    $numero_inst = $_POST['numero_inst'];
    $complem_inst = $_POST['complem_inst'];    
    $bairro_inst = $_POST['bairro_inst'];
    $tel_inst = $_POST['tel_inst'];
    $email_inst = $_POST['email_inst'];
    $id_cidade = $_POST['id_cidade'];
    $id_tipo_inst = $_POST['id_tipo_inst'];
    

    $sql = "SELECT cnpj_inst FROM instituicao WHERE cnpj_inst = '$cnpj_inst'";
    $query = mysqli_query($conn, $sql) or die("Erro: " . mysqli_error($conn));
    $row = mysqli_fetch_assoc($query);
    $cnpj = $row['cnpj_inst'];   

    /*
     * Validação dos campos vazios ou inválidos e evitando registro duplicado
    */

        if ($cnpj_inst == "") {
            echo "<script type='text/javascript'>alert('Informe o CNPJ da instituição.');location.href='../../view/cadastrarInstituicao.php';</script>";

            }else
            if(strlen($cnpj_inst) < 14 || strlen($cnpj_inst) > 14) {
                echo "<script type='text/javascript'>alert('O CNPJ deve conter 14 digitos.');location.href='../../view/cadastrarInstituicao.php';</script>";

                }else
                    if($cnpj_inst == $cnpj) {
                        echo "<script type='text/javascript'>alert('O cnpj informado já encontra-se cadastrado.');location.href='../../view/listarInstituicoes.php';</script>";

                    }else
                        if($nome_inst == "") {
                        echo "<script type='text/javascript'>alert('O campo NOME deve ser preenchido.');location.href='../../view/cadastrarInstituicao.php';</script>";

                    }else
                        if($logradouro_inst == "") {
                        echo "<script type='text/javascript'>alert('O campo LOGRADOURO deve ser preenchido.');location.href='../../view/cadastrarInstituicao.php';</script>";

                    }else
                        if($numero_inst == "") {
                        echo "<script type='text/javascript'>alert('O campo NÚMERO deve ser preenchido.');location.href='../../view/cadastrarInstituicao.php';</script>";

                        }else
                        if($complem_inst == "") {
                        echo "<script type='text/javascript'>alert('O campo COMPLEMENTO deve ser preenchido.');location.href='../../view/cadastrarInstituicao.php';</script>";

                        }else
                        if($bairro_inst == "") {
                        echo "<script type='text/javascript'>alert('O campo BAIRRO deve ser preenchido.');location.href='../../view/cadastrarInstituicao.php';</script>";

                        }else
                        if($tel_inst == "") {
                        echo "<script type='text/javascript'>alert('O campo TELEFONE deve ser preenchido.');location.href='../../view/cadastrarInstituicao.php';</script>";

                        }else
                        if($email_inst == "") {
                        echo "<script type='text/javascript'>alert('O campo EMAIL deve ser preenchido.');location.href='../../view/cadastrarInstituicao.php';</script>";

                        }else
                        if($id_cidade == "") {
                        echo "<script type='text/javascript'>alert('O campo CIDADE deve ser preenchido.');location.href='../../view/cadastrarInstituicao.php';</script>";

                        }else
                        if($id_tipo_inst == "") {
                        echo "<script type='text/javascript'>alert('O campo TIPO deve ser preenchido.');location.href='../../view/cadastrarInstituicao.php';</script>";

                    }else{

                        //Se tudo estiver OK, insere o registro no banco de dados                
                        $insert = "INSERT INTO instituicao(cnpj_inst, nome_inst, logradouro_inst, numero_inst, complem_inst, bairro_inst, tel_inst, email_inst, id_cidade, id_tipo_inst) VALUES('$cnpj_inst', '$nome_inst', '$logradouro_inst', '$numero_inst', '$complem_inst', '$bairro_inst', '$tel_inst', '$email_inst', '$id_cidade', '$id_tipo_inst')";
                        $result = mysqli_query($conn, $insert) or die("Erro: " . mysqli_error($conn));                
                    }

                        if($result){               

                        echo "<script type='text/javascript'>alert('Instituicao cadastrada com sucesso!');location.href='../../view/listarInstituicoes.php'</script>";
                    
                    } else {

                            echo "<script type='text/javascript'>alert('Não foi possível concluir o cadastro. Tente novamente.');location.href='../../view/cadastrarInstituicao.php'</script>";
                        }

    mysqli_close($conn);
}