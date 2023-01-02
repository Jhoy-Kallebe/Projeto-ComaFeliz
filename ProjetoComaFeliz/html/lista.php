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
        <a href="index.html">
            <img class="img-header" src="../imagens/coma-feliz-logo2.png" alt="logo coma feliz">
        </a>
	</header>

    <main id="principal2">
        <div class="data-agendamento">
            <p>Data atual: <?php echo date("d/m/Y"); ?></p>
            <div class="btn_nav">
                <a class="botao" href="#"><ion-icon name="print"></ion-icon>Imprimir</a>
                <a class="botao" href="solicitacaoAdm.php"><ion-icon name="arrow-back"></ion-icon>Voltar</a>    
            </div>
        </div>

        <div class="alunos">
                <div class="data">
                    <h4>Lista de Alunos - <?php $date = new DateTime('+1 day'); echo $date->format('d/m/Y'); ?></h4>
                </div>
                <div class="nomes">
                    <?php
                        $date = new DateTime('+1 day');
                        $data = $date->format('Y-m-d');
                        include_once "../php/includes/conexao.php";

                        $sql = "SELECT * FROM agendamento AS a INNER JOIN aluno AS al ON a.matricula = al.matricula where a.data_desejada = ?; ";

                        $stmt = $mysqli->prepare($sql);
                        $stmt->bind_param("s", $data);
                        $stmt->execute();

                        $result = $stmt->get_result();

                        if($result->num_rows > 0){

                            $listaAgendamentos = $result->fetch_all(MYSQLI_ASSOC);
                            $contador = 0;
                            foreach($listaAgendamentos as $agendamento){
                                if($agendamento['status_agendamento'] == "Aceito"){
                                    $contador++;
                                    echo "<h5>".$contador." - ".$agendamento['nome_aluno']."</h5>";
                                }
                                
                            }
                            if($contador == 0){
                                echo "Nenhum registro encontrado!";
                            }

                        }else{

                            echo "Nenhum registro encontrado!";
                        }

                        $mysqli->close();

                    ?>
                    
                </div>
                
        </div>
        
    </main>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');
    </style> 
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <footer>
        <p>Site criado pelo GRUPO <a href="#">Garotos de Programa</a> para o <a href="#">Instituto Federal Baiano - CAMPUS LAPA.</a></p>
    </footer>
</body>
</html>