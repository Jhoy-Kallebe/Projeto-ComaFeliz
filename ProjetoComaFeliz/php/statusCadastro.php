<?php

    include_once("includes/conexao.php");
    session_start();

    $resultado;

    if(!empty($_GET['sim'])){
        $resultado = $_GET['sim'];
    }elseif(!empty($_GET['nao'])){
        $resultado = $_GET['nao'];
    }

    

    $id = $_GET['id_cadastro'];
    
    if($resultado == 1){
        $sql = "UPDATE aluno SET cadastrado = 'sim' WHERE matricula = ?";
            
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();

        if($stmt->affected_rows == 1){

            echo "<script>console.log('Deu certo');</script>";
        }
    }elseif($resultado == 2){
        $sql = "delete from aluno where matricula = ?";
            
        $stmt = $mysqli->prepare($sql);

        if($stmt){
            $stmt->bind_param("s", $id);
            $stmt->execute();

            if($stmt->affected_rows == 1){
                echo "<script>console.log('Deu certo');</script>";
            }
        }

    }
    

    $stmt->close();
    $mysqli->close();
    header("location: autenticacao/avaliarSolicitacao.php");
?>