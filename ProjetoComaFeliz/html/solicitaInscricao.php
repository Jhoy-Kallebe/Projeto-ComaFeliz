<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Coma Feliz - Login</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="shortcut icon" href="../imagens/favicon-16x16.png" type="image/x-icon">
</head>

<body>
	<header >
		<a href="https://www.ifbaiano.edu.br/unidades/lapa/">
            <img class="img-header" src="../imagens/logo-ifbaiano-lapa.png" alt="logo ifbaiano campus lapa">
        </a>
        <a href="index.php">
            <img class="img-header" src="../imagens/coma-feliz-logo2.png" alt="logo coma feliz">
        </a>
	</header>

	<main id="principal">
		<div id="centraliza">
			
			<div id="descricao" class="container">

				<h3>Atenção!</h3>
				<p style="text-align: justify;" >Aqui você fará a sua solicitação de conta para poder acessar o site. Com isso, basta inserir os dados necessários e aguardar a confimação da CAE.</p>
				<a href="">Saiba mais</a>
			
			</div>
			<div id="formulario" class="container">

				<form action="../php/autenticacao/solicitarInscricao.php" method="post" class="form">
			        <div class="entradas">
			            <div class="email">
			                <ion-icon name="person-outline"></ion-icon>
			                <input type="text" placeholder="Nº de Matricula" name="matricula">
			            </div>	
						<div class="email">
			                <ion-icon name="code-working-outline"></ion-icon>
			                <input type="text" placeholder="Nome Completo" name="nome">
			            </div>	
						<div class="email">
			                <ion-icon name="mail-outline"></ion-icon>
			                <input type="text" placeholder="E-mail" name="email">
			            </div>	
						<div class="email">
			                <ion-icon name="git-network-outline"></ion-icon>
			                <input type="text" placeholder="Curso" name="curso">
			            </div>	
			            <div class="pass">
			                <ion-icon name="lock-closed-outline"></ion-icon>
			                <input type="password" placeholder="Senha" name="senha">
			            </div>
			        </div>
			        <div class="btn">
			            <input class="button" type="submit" value="Solicitar">
			        </div>
			    </form>

			</div>

		</div>
	</main>

	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');
	</style> 
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	
</body>
</html>