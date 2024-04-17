<?php
include('conexao_turmas.php');
include('funcoes_turmas.php');

// Verifica se o formulário foi enviado
if (isset($_POST['salvar'])) {
    // Obtém os dados do formulário
    $id = $_POST['id'];
    $id_escola = $_POST['id_escola'];
    $status = $_POST['status'];
    $turno = $_POST['turno'];
    $nome = $_POST['nome'];

    // Cria um array com os dados da turma
    $turma = [
        'id' => $id,
        'id_escola' => $id_escola,
        'status' => $status,
        'turno' => $turno,
        'nome' => $nome
    ];

    // Salva a turma no banco de dados
    if (salvar_turma($turma, $mysqli)) {
        echo "Operação realizada com sucesso.";
        header("Location: visualizar_turmas.php");
        exit();
    } else {
        echo "Erro ao realizar a operação: " . $mysqli->error;
        header('Location: visualizar_turmas.php');
    }
}
?>