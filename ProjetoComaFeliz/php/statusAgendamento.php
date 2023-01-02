<?php

    include_once("../php/includes/conexao.php");
    session_start();

    $resultado;

    if(!empty($_GET['sim'])){
        $resultado = $_GET['sim'];
    }elseif(!empty($_GET['nao'])){
        $resultado = $_GET['nao'];
    }

    $id = $_GET['id_agendamento'];

    if($resultado == 1){
        $sql = "UPDATE agendamento SET status_agendamento = 'Aceito' WHERE id_agendamento = ?";
            
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();

        if($stmt->affected_rows == 1){

            echo "<script>console.log('Deu certo');</script>";
        }
    }elseif($resultado == 2){
        $sql = "UPDATE agendamento SET status_agendamento = 'Recusado' WHERE id_agendamento = ?";
            
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();

        if($stmt->affected_rows == 1){

            echo "<script>console.log('Deu certo');</script>";
        }
    }
    

    $stmt->close();
    $mysqli->close();
    header("location: ../html/solicitacaoAdm.php");
?>