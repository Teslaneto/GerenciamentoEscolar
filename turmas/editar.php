<?php

include('conexao_turmas.php');

 
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $stmt = $mysqli->prepare("SELECT nome FROM tb_turmas WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($nome);
    $stmt->fetch();
    $stmt->close();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];

    
    $stmt = $mysqli->prepare("UPDATE tb_turmas SET nome = ? WHERE id = ?");
    $stmt->bind_param("si", $nome, $id);

    if ($stmt->execute()) {
        echo "Turmas atualizado com sucesso.";
       
        header("Location: visualizar_turmas.php");
        exit();
    } else {
        echo "Erro ao atualizar: " . $stmt->error;
    }

    
    $stmt->close();
}



$mysqli->close();
?>


<form method="post" action="">
    
    <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
    

    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?php echo isset($nome) ? $nome : ''; ?>" required>
     
 
    <input type="submit" value="Salvar">
</form>