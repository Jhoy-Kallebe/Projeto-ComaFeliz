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
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="shortcut icon" href="../imagens/favicon-16x16.png" type="image/x-icon">
</head>
<body>

    <header>
        <a href="https://www.ifbaiano.edu.br/unidades/lapa/">
            <img class="img-header" src="../imagens/logo-ifbaiano-lapa.png" alt="logo ifbaiano campus lapa">
        </a>
        <div style=' width: 30%; display: flex; align-items: center; justify-content: space-between;'>
        <p style='color: black;'><?php echo $_SESSION['nome']; ?></p>
            <a style='color: black; font-size: 25px;' href="../php/autenticacao/desconectar.php"><ion-icon name="log-out-outline"></ion-icon></a>
        </div>
        
        <a href="../php/autenticacao/desconectar.php">
            <img class="img-header" src="../imagens/coma-feliz-logo2.png" alt="logo coma feliz">
        </a>
	</header>

    <main id="principal2">
        <div class="data-agendamento">
            <p> Data atual: <?php echo date("d/m/Y"); ?> </p>
            <a class="botao" href="solicitacao.php"><ion-icon name="send"></ion-icon>Novo Agendamento</a>
        </div>
        <div class="agendamentos-feitos">
            <h3>Agendamentos Feitos</h1>
            <table>
                <thead>
                    <tr>
                        <th>Data Desejada</th><th>Status do Agendamento</th>
                    </tr>
                        <?php
                            session_start();
                            $matricula = $_SESSION['matricula'];

                            include_once "../php/includes/conexao.php";

                            $sql = "select * from agendamento where matricula = ? order by id_agendamento desc;";
                            
                            $stmt = $mysqli->prepare($sql);
                            $stmt->bind_param("s", $matricula);
                            
                            $stmt->execute();

                            $result = $stmt->get_result();

                            if($result->num_rows > 0){

                                $listaAgendamentos = $result->fetch_all(MYSQLI_ASSOC);

                                foreach($listaAgendamentos as $agendamento){

                                    echo "<tr>";
                                    echo "<td>".$agendamento['data_desejada']."</td>";
                                    echo "<td>".$agendamento['status_agendamento']."</td>";
                                    echo "</tr>";
                                }

                            }else{
                                echo "<tr>";
                                echo "<td> X </td>";
                                echo "<td> X </td>";
                                echo "</tr>";
                            }

                            $mysqli->close();

                        ?>
                </thead>
                
            </table>
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