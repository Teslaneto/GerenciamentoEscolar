<?php
include('conexao_escolas.php');
include('funcoes.php');

//preparar uma consulta SQL de exclusão (DELETE)
$stmt = $mysqli->prepare("DELETE FROM tb_escola WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Escola removida com sucesso.";
    header("Location: visualizar.php");
    exit();
} else {
    echo "Erro ao remover escola: " . $stmt->error;
}
?>