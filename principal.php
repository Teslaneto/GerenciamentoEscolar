<?php
require_once('php/validar_acesso.php');
require_once('php/funcoes.php');
require_once('php/conexao_escolas.php');

$total = getcontar_escolar($mysqli);
$totalTurmas = getcontar_totalTurmas($mysqli);
$totalProfessores = getcontar_professores($mysqli);

$nomesEscolas = getresgatar_todasEscola($mysqli);

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
            <li><a href="alunos.php">Alunos</a></li>
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
    <div style="margin-left: 50px;">
        <div class="escolar-contar" style="margin-right: 60%;">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-houses" viewBox="0 0 16 16">
                <path d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207z"/>
            </svg>
            <h3 class="text-contar"><strong>Total de Escolas: <?php echo $total['total']; ?></strong></h3>
        </div>

        <div class="turma-contar">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
            </svg>
            <h3 class="text-contar"><strong>Total de Turmas: <?php echo $totalTurmas['total']; ?></strong></h3>
        </div>

        <div class="pro-contar">
            <svg style="margin-left: 10px;" xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
            </svg>
            <h3 class="text-contar"><strong>Total de Professores: <?php echo $totalProfessores['total']; ?></strong></h3>
        </div>
    </div>
    <div class="interface-escolas">
        <h2 class="text-interface">ESCOLAS PRESENTES:</h2>
        <hr>
        <?php 
        foreach ($nomesEscolas as $nome) {
            echo '<div class="escola">
                    <h2>' . htmlspecialchars($nome) . '</h2>
                  </div>';
        } 
        ?>
    </div>

    
    <footer style="margin-top: 10%;">
        <p class="fontes">© 2024 Nosso Site. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
