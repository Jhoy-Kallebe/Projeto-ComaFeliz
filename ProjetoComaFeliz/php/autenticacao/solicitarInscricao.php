<?php

session_start();
include_once "../includes/conexao.php";

$_SESSION['matricula'] = "1";

if(empty($_POST['matricula']) || empty($_POST['senha'])){

    $_SESSION['msg'] = "Preencha todos os campos!";
    header("location: ../../html/index.html");

}else{
    $login = $_POST['matricula'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $curso = $_POST['curso'];
    $email = $_POST['email'];

    $sql = "select * from curso where nome_curso = ?";
    $stmt = $mysqli->prepare($sql);

    if($stmt){
        $stmt->bind_param("s", $curso);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows == 1){
            $curso = $result->fetch_object();
            $id_curso = $curso->id_curso;


            $sql = "insert into aluno(nome_aluno, senha, email, id_curso, matricula) values(?,?,?,?,?)";

            $stmt = $mysqli->prepare($sql);

            if($stmt){

                $stmt->bind_param("ssssi",$nome, $senha, $email, $id_curso, $login);
                $stmt->execute();

                $result = $stmt->get_result();

                if($result->num_rows == 1){

                    $aluno = $result->fetch_object();
                    $_SESSION['autenticado'] = true;
                    $_SESSION['nome_usuario'] = $aluno->nome_aluno;
                    $_SESSION['matricula'] = $aluno->matricula;
                    $stmt->close();
                    $mysqli->close();

                    header("location: ../../html/telaInicial.php");

                }else{
                    $_SESSION['msg'] = "Login ou senha incorretos!";
                    header("location: ../../html/index.php");
                }

            }else{

                $_SESSION['msg'] = "Erro";
                header("location: ../../html/index.php");

            }


        }

    }

    

    

}

?>