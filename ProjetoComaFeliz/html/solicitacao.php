<?php 
include_once("../php/autenticacao/verificaLogin.php");
session_start();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link rel="shortcut icon" href="../imagens/favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

    <header>
        <a href="https://www.ifbaiano.edu.br/unidades/lapa/">
            <img class="img-header" src="../imagens/logo-ifbaiano-lapa.png" alt="logo ifbaiano campus lapa">
        </a>
        <a href="index.html">
            <img class="img-header" src="../imagens/coma-feliz-logo2.png" alt="logo coma feliz">
        </a>
	</header>

    <main id="principal2">
        <div class="data-agendamento">
            <p> Data atual: <?php echo date("d/m/Y"); ?> </p>
            <a class="botao" href="telaInicial.php"><ion-icon name="arrow-back"></ion-icon>Voltar</a>
        </div>

        <form class="formularioAgendamento" action="../php/efetuaAgendamento.php" method="post">
            <input class="soli" type="date" placeholder="data desejada" name="data">
            <textarea style="resize: none" class="txtarea" placeholder="Motivo da solicitação" name="motivo"></textarea>
            
            <input class="botao" type="submit" value="Enviar Solicitação">
        </form> 
        
    </main>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');
    </style> 
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
</body>
<footer>
    <p>Site criado pelo GRUPO <a href="#">Garotos de Programa</a> para o <a href="#">Instituto Federal Baiano - CAMPUS LAPA.</a></p>
</footer>
</html>