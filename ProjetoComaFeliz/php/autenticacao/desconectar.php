<?php
session_start();
session_unset();
session_destroy();
header("location: ../../html/index.php");

//Arquivo de logout - destroi a sessão
//e redireciona o usuário para a página de login

?>