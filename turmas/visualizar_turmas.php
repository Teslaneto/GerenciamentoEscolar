<?php
include('conexao_turmas.php');
include('funcoes_turmas.php');

// Consulta todas as turmas do banco de dados
$turmas = listar_turmas($mysqli);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Turmas</title>
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
        <h1 class="form-header">Lista de Turmas</h1>
        <ul class="form-list">
            <?php while ($turma = $turmas->fetch_assoc()): ?>
                <li>
                    <strong>Nome:</strong> <?php echo htmlspecialchars($turma['nome']); ?><br>
                    <strong>ID da Escola:</strong> <?php echo htmlspecialchars($turma['id_escola']); ?><br>
                    <strong>Turno:</strong> <?php echo htmlspecialchars($turma['turno']); ?><br>
                    <div class="form-actions">
                        <a href="editar.php?id=<?php echo htmlspecialchars($turma['id']); ?>">Editar</a>
                        <a href="remover_turmas.php?id=<?php echo htmlspecialchars($turma['id']); ?>" onclick="return confirm('Você tem certeza que deseja remover esta turma?');">Remover</a>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
        <button class="form-submit" onclick="window.location.href='../turmas.php';">Voltar</button>
    </div>

    <?php
    // Fecha a conexão com o banco de dados
    $mysqli->close();
    ?>
</body>
</html>
