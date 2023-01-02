<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}
if(!isset($_SESSION['nome_usuario']) && $_SESSION['autenticado'] != true){
    header("location: ../html/index.php");
}
//Verfificar se o usuário está autenticado e, caso não esteja,
//redirecionar para a página de login. Este arquivo será 
//incluído em todas as páginas restritas da aplicação.
?>