<?php
session_start();
include_once "includes/conexao.php";
$mensagem;

    $data = $_POST['data'];
    $motivo = $_POST['motivo'];
    $idAdm = 1;

    $sql = "insert into agendamento (matricula, data_desejada, justificativa, id_administrador) values (?,?,?,?);";

    $stmt = $mysqli->prepare($sql);

    if($stmt){
        $stmt->bind_param("sssi", $_SESSION['matricula'], $data, $motivo, $idAdm);
        $stmt->execute();

        if($stmt->affected_rows > 0){
            //$mensagem = "<script>alert('Agendamento efetuado com sucesso!');</script>";
        }else{
        }
        $stmt->close();
    }else{

    }


$mysqli->close();
header("location: ../html/solicitacao.php");

?>