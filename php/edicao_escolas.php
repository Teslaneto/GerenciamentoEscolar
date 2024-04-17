<?php
include('conexao_escolas.php');


// Verifica se o formulário foi enviado
if (isset($_POST['salvar'])) {
    
    // Obtém os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $inep = $_POST['inep'];
    $status = $_POST['status'];

    // Atualiza os dados da escola no banco de dados
    $query = "UPDATE tb_escola SET nome='$nome', endereco='$endereco', inep='$inep', status='$status' WHERE id='$id'";

    // Executa a consulta
    if ($mysqli->query($query)) {
        echo "Escola atualizada com sucesso.";

        // Redireciona para a página de visualização de escolas
        header("Location: visualizar.php");
        exit();
    } else {
        echo "Erro ao atualizar escola: " . $mysqli->error;
    }
}


$mysqli->close();
?>