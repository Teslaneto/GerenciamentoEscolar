<?php

$hostname = "localhost";
$bancodedados = "db_minhaescola";
$usuario = "root";
$senha = "";

$mysqli = new mysqli ($hostname, $usuario, $senha, $bancodedados);

// Verifica se houve um erro na conexão
if ($mysqli->connect_errno) {
    echo "Falha ao conectar com o servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

// Consulta todas as escolas do banco de dados
$query = "SELECT * FROM tb_escola";

$result = $mysqli->query($query);

// Exibe todas as escolas como uma lista com opções para editar ou remover
echo "<h2>Lista de Escolas</h2>";
echo "<ul>";
while ($escola = $result->fetch_assoc()) {

    echo "<li>";
    echo "Nome: " . $escola['nome'];
    echo " | Endereço: " . $escola['endereco'];
    echo " | INEP: " . $escola['inep'];
    echo " | Status: " . $escola['status'];
    echo " | <a href=\"editar.php?id=" . $escola['id'] . "\">Editar</a>";
    echo " | <a href=\"remover.php?id=" . $escola['id'] . "\" onclick=\"return confirm('Você tem certeza que deseja remover esta escola?')\">Remover</a>";
    echo "</li>";
}
echo "</ul>";

// Fecha a conexão com o banco de dados
$mysqli->close();