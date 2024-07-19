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
    <link rel="stylesheet" type="text/css" href="css/form_escola.css">
</head>
<body>
    <div>
        <ul class="nav">
            <img class="img1" src="img/Minha_Escola.png" alt="logo">
            <li><a href="principal.php">Home</a></li>
            <li><a href="turmas.php">Turmas</a></li>
            <li><a href="escolas.php">Escolas</a></li>
            <li><a href="professores.php">Professores</a></li>
            <li><a href="alunos.php">Alunos</a></li>
            <li><a href="logoff.php">Sair</a></li>
        </ul>
    </div>
    <div class="form-container">
        <h1 class="form-header">Adicionar de Alunos</h1>
        <form method="POST" action="alunos/adicionar_alunos.php">

            <label for="nome" class="form-label">Aluno Nome:</label>
            <input type="text" name="nome" value="" class="form-input" placeholder="Digite o nome do Aluno." style="margin-left:-10px;">
            
            <label for="id_escola" class="form-label">Escolas :</label>
            <input type="text" name="escola" value="" class="form-input" placeholder="Digite o Id Escolar"  style="margin-left:-10px;"> 
            
            <input type="submit"value="Enviar" class="form-submit" >
        </form>

        <!-- Link para visualizar Alunos existentes -->
        <a href="alunos/visualizar.php" class="form-link">Visualizar Alunos</a>

    </div>
    <p style="margin-top: 50%;">
    <footer style="margin-top: 10%;">
        <p class="fontes">© 2024 Nosso Site. Todos os direitos reservados.</p>
    </footer>
</body>
</html>