<?php
include('conexao_turmas.php');
include('funcoes_turmas.php');

// Consulta todas as turmas do banco de dados
$turmas = listar_turmas($mysqli);

// Exibe todas as turmas como uma lista com opções para editar ou remover
echo "<h2>Lista de Turmas</h2>";
echo "<ul>";
while ($turma = $turmas->fetch_assoc()) {
    echo "<li>";
    echo "Nome: " . $turma['nome'];
    echo " | ID da Escola: " . $turma['id_escola'];
    echo " | Status: " . $turma['status'];
    echo " | Turno: " . $turma['turno'];
    echo " | <a href=\"editar.php?id=" . $turma['id'] . "\">Editar</a>";
    echo " | <a href=\"remover_turmas.php?id=" . $turma['id'] . "\" onclick=\"return confirm('Você tem certeza que deseja remover esta turma?')\">Remover</a>";
    echo "</li>";
}
echo "</ul>";




// Fecha a conexão com o banco de dados
$mysqli->close();
?>