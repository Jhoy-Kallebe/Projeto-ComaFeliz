<?php

$host = "localhost";
$usuarioBD = "root";
$senhaBD = "";
$bd = "comafeliz";

$mysqli = new mysqli($host, $usuarioBD, $senhaBD, $bd);

if($mysqli->connect_errno){
    die("Erro ao conectar com o banco de dados");
}

?>