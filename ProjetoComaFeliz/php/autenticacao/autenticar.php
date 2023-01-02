<?php
//Arquivo que possui a lógica da autenticação,
//incluindo o acesso ao banco de dados e criação
//da sessão para o usuário autenticado
session_start();
include_once "../includes/conexao.php";

$_SESSION['matricula'] = "1";
$_SESSION['nome'] = "nome";

if(empty($_POST['matricula']) || empty($_POST['senha'])){

    $_SESSION['msg'] = "Preencha todos os campos!";
    header("location: ../../html/index.html");

}else{
    $login = $_POST['matricula'];
    $senha = $_POST['senha'];

    $sql = "select * from aluno where matricula = ? and senha = ?";

    $stmt = $mysqli->prepare($sql);

    if($stmt){

        $stmt->bind_param("ss",$login, $senha);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows == 1){

            $aluno = $result->fetch_object();
            if($aluno->cadastrado == "sim"){
                echo "<script>alert(".$aluno->cadastrado.")</script>";
                $_SESSION['autenticado'] = true;
                $_SESSION['nome_usuario'] = $aluno->nome_aluno;
                $_SESSION['matricula'] = $aluno->matricula;
                $_SESSION['nome'] = $aluno->nome_aluno;
                $stmt->close();
                $mysqli->close();

                header("location: ../../html/telaInicial.php");
            }else{
                header("location: ../../html/index.php");
            }

        }else{

            $_SESSION['msg'] = "Login ou senha incorretos!";
            header("location: ../../html/index.php");
        }
    }else{

        $_SESSION['msg'] = "Erro";
        header("location: ../../html/index.php");

    }

}

?>