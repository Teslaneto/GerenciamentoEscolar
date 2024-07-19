<? require_once ('php/validar_acesso.php'); ?>

<html>
    <head>
        <title>Geraldo</title>
        <link rel="stylesheet" type="text/css" href="css/principal.css">
        <link rel="stylesheet" type="text/css" href="css/form.css">
    </head>
    <body>
        <div>
            <ul class="nav">
                <img class="img1" src="img/Minha_Escola.png" alt="logo">
                <li><a href="principal.php">Home</a></li>
                <li><a href="turmas.php">Turmas</a></li>
                <li><a href="escolas.php">Escolas</a></li>
                <li><a href="professores.php">Professores</a></li>
                <li><a href="alunos.php">Alunos</a></li>
                <li><a href="logoff.php">Sair</a></li>
            </ul>
        </div>
        <div class="form-container">
        <h1 class="form-header">Gerenciamento de Professores</h1>
    
        <!-- Formulário para adicionar ou editar professores -->
        <form method="post" action="professores/banco_professores.php">
            <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
            
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-input" value="<?php echo isset($_GET['id']) ? buscar_professores($_GET['id'], $mysqli)['nome'] : ''; ?>" required>
            
            <input type="submit" name="salvar" value="Salvar" class="form-submit">


        </form>


        <!-- Link para visualizar professores existentes -->
        <a href="professores/visualizar.php" class="form-link">Visualizar Professores</a>
    </div>
    </body>
</html>