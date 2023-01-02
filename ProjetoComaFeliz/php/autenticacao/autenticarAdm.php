<?php

session_start();
include_once "../includes/conexao.php";

if(empty($_POST['usuario']) || empty($_POST['senha'])){

    $_SESSION['msg'] = "Preencha todos os campos!";
    header("location: ../../html/indexAdm.html");

}else{
    $login = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "select * from administrador where login = ? and senha = ? ;";

    $stmt = $mysqli->prepare($sql);

    if($stmt){

        $stmt->bind_param("ss",$login, $senha);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows == 1){
            $aluno = $result->fetch_object();
                $_SESSION['autenticado'] = true;
                $_SESSION['matricula'] = $aluno->id_administrador;
                $stmt->close();
                $mysqli->close();

                header("location: ../../html/solicitacaoAdm.php");
           
            

        }else{

            $_SESSION['msg'] = "Login ou senha incorretos!";
            header("location: ../../html/indexAdm.php");
        }
    }else{

        $_SESSION['msg'] = "Erro";
        header("location: ../../html/indexAdm.php");

    }

}


?>