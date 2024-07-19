<html>
    <head>
        <title>Turmas</title>
        <link rel="stylesheet" type="text/css" href="css/principal.css">
        <link rel="stylesheet" type="text/css" href="css/form_escola.css">
    </head>
    <body>
        <div>
            <ul class="nav">
                <img class="img1" src="img/Minha_Escola.png" alt="logo">
                <li><a href="principal.php">Home</a></li>
                <li><a href="turmas.php">Turmas</a></li>
                <li><a href="#nf">Escolas</a></li>
                <li><a href="professores.php">Professores</a></li>
                <li><a href="professores.php">Alunos</a></li>
                <li><a href="logoff.php">Sair</a></li>
            </ul>
        </div>
        <div class="form-container">
        <h1 class="form-header">Gerenciamento de Escolas</h1>
        
        <!-- Formulário para adicionar ou editar escolas -->
        <form method="post" action="php/banco_escola.php">
            <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">

            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-input" value="<?php echo isset($_GET['id']) ? buscar_escola($_GET['id'], $mysqli)['nome'] : ''; ?>" required>
            
            <label for="endereco" class="form-label">Endereço:</label>
            <input type="text" name="endereco" id="endereco" class="form-input" value="<?php echo isset($_GET['id']) ? buscar_escola($_GET['id'], $mysqli)['endereco'] : ''; ?>" required>
            
            <label for="inep" class="form-label">INEP:</label>
            <input type="text" name="inep" id="inep" class="form-input" value="<?php echo isset($_GET['id']) ? buscar_escola($_GET['id'], $mysqli)['inep'] : ''; ?>" required>
            
            <label for="status" class="form-label">Status:</label>
            <select name="status" id="status" required>
                <option value="ativo" <?php echo isset($_GET['id']) && buscar_escola($_GET['id'], $mysqli)['status'] == 'ativo' ? 'selected' : ''; ?>>Ativo</option>
                <option value="inativo" <?php echo isset($_GET['id']) && buscar_escola($_GET['id'], $mysqli)['status'] == 'inativo' ? 'selected' : ''; ?>>Inativo</option>
            </select>
            
            <input type="submit" name="salvar" value="Salvar" class="form-submit">
        </form>

        <!-- Link para visualizar escolas existentes -->
        <a href="php/visualizar.php" class="form-link">Visualizar Escolas</a>
    </div>
    </body>
</html>