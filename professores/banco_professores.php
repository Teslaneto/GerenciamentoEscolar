<?php
include('conexao_professores.php');

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nome = $_POST['nome'];

    // Verifica se está fazendo uma operação de edição ou cadastro
    if ($id) {
        // Atualiza um professor existente
        $stmt = $mysqli->prepare("UPDATE tb_professores SET nome = ? WHERE id = ?");
        $stmt->bind_param("si", $nome, $id);
    } else {
        // Insere um novo professor
        $stmt = $mysqli->prepare("INSERT INTO tb_professores (nome) VALUES (?)");
        $stmt->bind_param("s", $nome);
    }

    // Executa a consulta
    if ($stmt->execute()) {
        echo "Operação realizada com sucesso.";
        header("Location: visualizar.php");
        exit();
    } else {
        echo "Erro ao realizar a operação: " . $stmt->error;
    }

    // Fecha a declaração preparada
    $stmt->close();
}

// Verifica se há um ID na URL para remoção
if (isset($_GET['remover'])) {
    $id = $_GET['remover'];

    // Remove um professor específico
    $stmt = $mysqli->prepare("DELETE FROM tb_professores WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Executa a consulta
    if ($stmt->execute()) {
        echo "Professor removido com sucesso.";
        header("Location: visualizar.php");
        exit();
    } else {
        echo "Erro ao remover professor: " . $stmt->error;
    }

    // Fecha a declaração preparada
    $stmt->close();
}

// Fecha a conexão com o banco de dados
$mysqli->close();
?>