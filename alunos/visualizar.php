<?php
include("conexao.php");

// Preparar a consulta SQL com INNER JOIN
$query = $mysqli->prepare("SELECT tb_alunos.nome AS aluno_nome, tb_escola.nome AS escola_nome
                           FROM tb_alunos
                           INNER JOIN tb_escola ON tb_alunos.escola_id = tb_escola.id");

$query->execute();

// Obter os resultados
$result = $query->get_result();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/exibir_alunos.css">
    <title>Visualizar Alunos</title>
</head>
<body>
<div class="form-container">
        <h1 class="form-header">Lista de Alunos e suas Escolas</h1>
        <table class="form-table">
            <tr>
                <th>Nome do Aluno</th>
                <th>Nome da Escola</th>
            </tr>
            <?php
            // Loop através dos resultados e exibir cada linha
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['aluno_nome']) . "</td>";
                echo "<td>" . htmlspecialchars($row['escola_nome']) . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <button class="form-submit" onclick="window.location.href='../alunos.php';">Voltar</button>
    </div>
</body>
</html>
