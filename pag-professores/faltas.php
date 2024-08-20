<?php
include("conexao.php");
session_start();

if (!isset($_SESSION['professor_id'])) {
    header("Location: /Projeto-de-Gerenciamento-Escolar/acessoprofe.php");
    exit();
}

$professor_id = $_SESSION['professor_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Presença</title>
    <link rel="stylesheet" href="css/exibir_faltas.css">
</head>
<body>
    <h1 class="text">Sistema de Presença</h1>
    <ul class="quadro">
        <li class="botao"><a href="registro_presenca.php" style="text-decoration: none; color: black;">Registrar Presença</a></li>
        <li class="botao"><a href="verificar_faltas.php" style="text-decoration: none; color: black;">Verificar Limite de Faltas</a></li>
        <li class="botao"><a href="inicio.php" style="text-decoration: none; color: black;">Sair</a></li>
    </ul>
</body>
</html>
