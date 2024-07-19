<?php
include('conexao_professores.php');

// Consulta para buscar todos os registros de professores
$query = "SELECT * FROM tb_professores";
$result = $mysqli->query($query);

// Verifica se houve um erro ao executar a consulta
if (!$result) {
    echo "Erro ao buscar registros: " . $mysqli->error;
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Professores</title>
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

        .form-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .form-table th, .form-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .form-table th {
            background-color: #f2f2f2;
        }

        .form-table tr:nth-child(even) {
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
        <h1 class="form-header">Visualizar Professores</h1>
        <table class="form-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['nome']); ?></td>
                        <td class="form-actions">
                            <!-- Link para editar -->
                            <a href="editar.php?id=<?php echo htmlspecialchars($row['id']); ?>">Editar</a>

                            <!-- Link para remover -->
                            <a href="banco_professores.php?remover=<?php echo htmlspecialchars($row['id']); ?>" onclick="return confirm('Tem certeza que deseja remover este professor?');">Remover</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <button class="form-submit" onclick="window.location.href='../professores.php';">Voltar</button>
    </div>

    <?php
    // Libera o resultado
    $result->free();

    // Fecha a conexão com o banco de dados
    $mysqli->close();
    ?>
</body>
</html>
