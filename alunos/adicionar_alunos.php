<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeAluno = $_POST['nome'];
    $idEscola = $_POST['escola'];

    if (isset($nomeAluno) && isset($idEscola)) {
        $query = $mysqli->prepare("INSERT INTO tb_alunos (nome, escola_id) VALUES (?, ?)");
        $query->bind_param("si", $nomeAluno, $idEscola);

        if ($query->execute()) {
            header("Location: /Projeto-de-Gerenciamento-Escolar/alunos.php");
        } else {
            header("Location: /Projeto-de-Gerenciamento-Escolar/principal.php");
        }
        $query->close();
    }
}
?>
