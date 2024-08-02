<?php
?>

<!DOCTYPE html>
<html>
<head>
    <title>Geraldo</title>
    <link rel="stylesheet" type="text/css" href="css/principal.css">
    <link rel="stylesheet" type="text/css" href="css/exibir_janela.css">
</head>
<body>
    <div>
        <ul class="nav">
            <img class="img1" src="/Projeto-de-Gerenciamento-Escolar/img/Minha_Escola.png" alt="logo">
            <li><a href="inicio.php">Home</a></li>
            <li><a href="turmas.php">Turmas</a></li>
            <li><a href="escolas.php">Escolas</a></li>
            <li><a href="professores.php">Professores</a></li>
            <li><a href="alunos.php">Alunos</a></li>
            <li><a href="logoff.php">Sair</a></li>
        </ul>
    </div>
    
    <h1 class="text">Turmas:</h1>

    <div class="overlay" id="overlay"></div>
        <div class="janela" id="janela">
            <h2>Minha Janela</h2>
            <p>Conteúdo da janela aqui.</p>
            <button id="fecharJanela">Fechar</button>
        </div>

    <button class="botao" id="abrirJanela">Abrir Janela</button>

    <script>
        // JavaScript para abrir e fechar a janela
        document.getElementById('abrirJanela').addEventListener('click', function() {
            document.getElementById('janela').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        });

        document.getElementById('fecharJanela').addEventListener('click', function() {
            document.getElementById('janela').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        });

        document.getElementById('overlay').addEventListener('click', function() {
            document.getElementById('janela').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        });
    </script>

    
    

    
    <footer style="margin-top: 10%;">
        <p class="fontes">© 2024 Nosso Site. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
