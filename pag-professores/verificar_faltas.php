<?php
include("conexao.php");
session_start();

if (!isset($_SESSION['professor_id'])) {
    header("Location: /Projeto-de-Gerenciamento-Escolar/acessoprofe.php");
    exit();
}

$professor_id = $_SESSION['professor_id'];

$query = "
    SELECT 
        tb_alunos.nome AS aluno, 
        tb_turmas.nome AS turma, 
        COUNT(tb_presencas.id) AS faltas, 
        tb_turmas.limite_faltas
    FROM 
        tb_presencas 
    INNER JOIN 
        tb_alunos ON tb_presencas.id_aluno = tb_alunos.id
    INNER JOIN 
        tb_turmas ON tb_presencas.id_turma = tb_turmas.id
    WHERE 
        tb_presencas.presente = 0
    GROUP BY 
        tb_alunos.id, tb_turmas.id
    HAVING 
        faltas > tb_turmas.limite_faltas";

$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "O aluno {$row['aluno']} da turma {$row['turma']} excedeu o limite de faltas com {$row['faltas']} faltas.<br>";
    }
} else {
    echo "Nenhum aluno excedeu o limite de faltas.";
}
?>