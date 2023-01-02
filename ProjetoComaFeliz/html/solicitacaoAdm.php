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
	<header >
		<a href="https://www.ifbaiano.edu.br/unidades/lapa/">
            <img class="img-header" src="../imagens/logo-ifbaiano-lapa.png" alt="logo ifbaiano campus lapa">
        </a>
        <div style=' width: 30%; display: flex; align-items: center; justify-content: space-between;'>
            <a style='color: black; margin-bottom: 10px' href='../php/autenticacao/avaliarSolicitacao.php'>Verificar Solicitações de cadastro</a>
            <a style='color: black; font-size: 25px;' href="../php/autenticacao/desconectarAdm.php"><ion-icon name="log-out-outline"></ion-icon></a>
        </div>
        <a href="../php/autenticacao/desconectarAdm.php">
            <img class="img-header" src="../imagens/coma-feliz-logo2.png" alt="logo coma feliz">
        </a>
	</header>

    <main id="principal2">
        <div class="data-agendamento">
            <p>Data atual: <?php echo date("d/m/Y"); ?></p>
            <a class="botao" href="lista.php"><ion-icon name="eye"></ion-icon>Visualizar lista</a>
        </div>

        <div class="corpo">        
            <?php

                include_once "../php/includes/conexao.php";

                $sql = "SELECT * FROM agendamento INNER JOIN aluno ON agendamento.matricula = aluno.matricula;";

                $result = $mysqli->query($sql);

                if($result->num_rows > 0){
                
                    while($solicitacao = $result->fetch_object()){
                        if($solicitacao->status_agendamento == "Em espera"){
                            echo "<form action='../php/statusAgendamento.php' method='get'>";
                            echo "<div class='solicitacao'>";
                            echo "<input type='hidden' name='id_agendamento' value=".$solicitacao->id_agendamento.">";
                            echo "<div class='contspace'>";
                            echo    "<div class='uniao'>";
                            echo        "<div class='container1'>";
                            echo            "<div class='centralizarImg'>";
                            echo                "<div class='imagem_usuario'>";
                            echo                    "<ion-icon name='person'></ion-icon>";
                            echo                "</div>";
                            echo            "</div>";
                                        
                            echo            "<div class='identificacao'>";
                            echo                "<div class='centralizar'>";
                            echo                    "<div id='nome'>";
                            echo                        "<h4>".$solicitacao->nome_aluno."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$solicitacao->data_desejada."</h4>";
                            echo                    "</div>";
                            echo                    "<div id='matricula'>";
                            echo                        "<h4>".$solicitacao->matricula."</h4>";
                            echo                    "</div>";
                            echo                "</div>";
                            echo            "</div>";
                            echo        "</div>";
                                    
                            echo        "<div class='container2'>";
                            echo            "<div class='buttons'>";
                            echo                "<button id='yes' type='submit' name='sim' value='1' >";
                            echo                    "<ion-icon name='checkmark-outline'></ion-icon>";
                            echo                "</button>";
                            echo                "<button id='no' type='submit'  name='nao' value='2' >";
                            echo                    "<ion-icon name='close-outline'></ion-icon>";
                            echo                "</button>";
                            echo            "</div>";
                            echo        "</div>";
                                    
                            echo    "</div>";
                    
                            echo    "<div id='justificativa'>";
                            echo        "<p>".$solicitacao->justificativa."</p>";
                            echo    "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</form>";
                        }
                    }

                }else{
                    echo "<p style='color: black; align-self: center;' >Nenhum registro encontrado!</p>";
                }

                $mysqli->close();

            ?>


        </div>

        
    </main>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');
    </style> 
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
</body>
<footer>
    <p>Site criado pelo GRUPO <a href="#">InfoTécnicos</a> para o <a href="#">Instituto Federal Baiano - CAMPUS LAPA.</a></p>
</footer>
</html>