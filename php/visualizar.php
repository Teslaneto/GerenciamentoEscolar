<?php

$hostname = "localhost";
$bancodedados = "db_minhaescola";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);

// Verifica se houve um erro na conexão
if ($mysqli->connect_errno) {
    echo "Falha ao conectar com o servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

// Consulta todas as escolas do banco de dados
$query = "SELECT * FROM tb_escola";
$result = $mysqli->query($query);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Escolas</title>
    <style>
        .form-container {
            margin: 0 auto;
            margin-top: 5%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            width: 500px;
        }

        .form-header {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .form-list {
            list-style-type: none;
            padding: 0;
        }

        .form-list li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .form-list li:nth-child(even) {
            background-color: #f9f9f9;
        }

        .form-actions a {
            margin-right: 10px;
            color: #007BFF;
            text-decoration: none;
        }

        .form-actions a:hover {
            text-decoration: underline;
        }

        .form-submit {
            background-color: #FF7B02;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 class="form-header">Lista de Escolas</h1>
        <ul class="form-list">
            <?php
            // Loop através dos resultados e exibir cada linha
            while ($escola = $result->fetch_assoc()) {
                echo "<li>";
                echo "<strong>Nome:</strong> " . htmlspecialchars($escola['nome']) . "<br>";
                echo "<strong>Endereço:</strong> " . htmlspecialchars($escola['endereco']) . "<br>";
                echo "<strong>INEP:</strong> " . htmlspecialchars($escola['inep']) . "<br>";
                echo "<strong>Status:</strong> " . htmlspecialchars($escola['status']) . "<br>";
                echo "<strong>ID:</strong> " . htmlspecialchars($escola['id']) . "<br>";
                echo "<div class=\"form-actions\">";
                echo "<a href=\"editar.php?id=" . htmlspecialchars($escola['id']) . "\">Editar</a>";
                echo "<a href=\"remover.php?id=" . htmlspecialchars($escola['id']) . "\" onclick=\"return confirm('Você tem certeza que deseja remover esta escola?')\">Remover</a>";
                echo "</div>";
                echo "</li>";
            }
            ?>
        </ul>
        <button class="form-submit" onclick="window.location.href='../escolas.php';">Voltar</button>
    </div>
</body>
</html>
<?php
// Fecha a conexão com o banco de dados
$mysqli->close();
?>
