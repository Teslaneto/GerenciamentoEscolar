<?php
require_once('php/validar_acesso.php');
require_once('php/funcoes.php');
require_once('php/conexao_escolas.php');

$total = getcontar_escolar($mysqli);

$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Geraldo</title>
    <link rel="stylesheet" type="text/css" href="css/principal.css">
</head>
<body>
    <div>
        <ul class="nav">
            <img class="img1" src="img/Minha_Escola.png" alt="logo">
            <li><a href="#">Home</a></li>
            <li><a href="turmas.php">Turmas</a></li>
            <li><a href="escolas.php">Escolas</a></li>
            <li><a href="professores.php">Professores</a></li>
            <li><a href="logoff.php">Sair</a></li>
        </ul>
    </div>

    <div>
        <div class="center">
            <div class="back-ground">
                <img class="banner" src="/Projeto-de-Gerenciamento-Escolar/img/matrículas.png" alt="">
            </div>
        </div>
    </div>

    <div class="escolar-contar" style="margin-right: 60%;">
        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-houses" viewBox="0 0 16 16">
            <path d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207z"/>
        </svg>
        <p class="text-contar"><strong> Total De Escolas:</strong></p>
        <p class="text-contar" style="color: black;"><strong><?php echo "0",$total['total']; ?> </strong></p>
    </div>

    <div class="info-section">
        <h2 class="center">Informações</h2>
        <p class="center">Aqui estão algumas informações sobre o nosso site e os serviços que oferecemos.</p>
        <p class="center">Você pode adicionar mais conteúdo e seções aqui.</p>
    </div>

    <footer>
        <p class="fontes">© 2024 Nosso Site. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
