<?php
include('conexao_turmas.php');
include('funcoes_turmas.php');

// Verifica se o ID da turma foi recebido pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Remove a turma com o ID especificado
    if (remover_turma($id, $mysqli)) {
        echo "Turma removida com sucesso.";
        header("Location: visualizar_turmas.php");
        exit();
    } else {
        echo "Erro ao remover a turma: " . $mysqli->error;
    }
}

// Fecha a conexão com o banco de dados
$mysqli->close();
?>