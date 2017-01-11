<?php

require_once 'conexao.php';

$login_cookie = $_COOKIE['usuarioLogin'];
if (isset($login_cookie)) {

    /*
     * Definindo a permissão de acesso para usuários
     */
  
    $sql1 = "SELECT codigoTipoUsuario FROM usuario WHERE usuarioLogin = '$login_cookie'";
    $query1 = mysqli_query($conn, $sql1) or die("Não foi possível selecionar os dados dos usuários " . mysqli_error($conn));
    while ($row1 = mysqli_fetch_assoc($query1)) {
        $codigoTipoUsuario = $row1['codigoTipoUsuario'];

        if ($codigoTipoUsuario == 1) {

            //echo "Acessível apenas para administradores";
            header('Location:../view/inicioAdministrador.php');

        } else 
            if ($codigoTipoUsuario == 2) {

                //echo "Acessível apenas para professores";
                header('Location:../view/inicioProfessor.php');

            } else {                

                    echo "<script type='text/javascript'>alert(Informe o tipo do usuário!);location.href='../view/cadastroUsuario.php';</script>";
                }
            }
        }
?>