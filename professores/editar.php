<?php
// Inclua o arquivo de conexão com o banco de dados
include('conexao_professores.php');

// Verifica se há um ID na URL para editar o professor
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar informações do professor do banco de dados com base no ID
    $stmt = $mysqli->prepare("SELECT nome FROM tb_professores WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($nome);
    $stmt->fetch();
    $stmt->close();
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];

    // Atualiza um professor existente no banco de dados
    $stmt = $mysqli->prepare("UPDATE tb_professores SET nome = ? WHERE id = ?");
    $stmt->bind_param("si", $nome, $id);

    // Executa a consulta e verifica se a operação foi bem-sucedida
    if ($stmt->execute()) {
        echo "Professor atualizado com sucesso.";
        // Redireciona para a página de visualização de professores
        header("Location: visualizar.php");
        exit();
    } else {
        echo "Erro ao atualizar professor: " . $stmt->error;
    }

    // Fecha a declaração preparada
    $stmt->close();
}

// Fecha a conexão com o banco de dados
$mysqli->close();
?>

<!-- Formulário HTML para editar um professor -->
<form method="post" action="">
    <!-- Inclui o ID do professor como um campo oculto para identificar o professor -->
    <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
    
    <!-- Campo para o nome do professor -->
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?php echo isset($nome) ? $nome : ''; ?>" required>
    
    <!-- Botão para enviar o formulário -->
    <input type="submit" value="Salvar">
</form>