<?php
require_once('php/validar_acesso.php');
require_once('php/funcoes.php');
require_once('php/conexao_escolas.php');
require_once('alunos/adicionar_alunos.php');

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
            <li><a href="principal.php">Home</a></li>
            <li><a href="turmas.php">Turmas</a></li>
            <li><a href="escolas.php">Escolas</a></li>
            <li><a href="professores.php">Professores</a></li>
            <li><a href="professores.php">Alunos</a></li>
            <li><a href="logoff.php">Sair</a></li>
        </ul>
    </div>

    <form method="POST" action="alunos/adicionar_alunos.php">

        <label for="nome">Aluno Nome:</label>
        <br>
        <input type="text" name="nome" value="" placeholder="Digite o nome do Aluno.">
        
        <br>
        <label for="id_escola">Escolas :</label>
        <br>
        <input type="text" name="escola" value="" placeholder="Digite o Id Escolar"> 
        
        <input type="submit"value="Enviar" >
    </form>

    <p style="margin-top: 50%;">
    <footer style="margin-top: 10%;">
        <p class="fontes">© 2024 Nosso Site. Todos os direitos reservados.</p>
    </footer>
</body>
</html>