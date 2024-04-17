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
    <title>Visualizar Professores</title>
</head>
<body>
    <h1>Visualizar Professores</h1>

    <!-- Tabela para exibir professores -->
    <table border="1">
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
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td>
                        <!-- Link para editar -->
                        <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>

                        <!-- Link para remover -->
                        <a href="banco_professores.php?remover=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja remover este professor?');">Remover</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php
    // Libera o resultado
    $result->free();

    // Fecha a conexão com o banco de dados
    $mysqli->close();
    ?>
</body>
</html>