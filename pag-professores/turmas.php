<?php
include("conexao.php");
session_start();

if (!isset($_SESSION['professor_id'])) {
    // Redirecionar para a página de login se o professor não estiver logado
    header("Location: /Projeto-de-Gerenciamento-Escolar/acessoprofe.php");
    exit();
}

$professor_id = $_SESSION['professor_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Geraldo</title>
    <link rel="stylesheet" type="text/css" href="css/principal.css">
    <link rel="stylesheet" type="text/css" href="css/exibir_janela1.css">
</head>
<body>
    <div>
        <ul class="nav">
            <img class="img1" src="/Projeto-de-Gerenciamento-Escolar/img/Minha_Escola.png" alt="logo">
            <li><a href="inicio.php">Home</a></li>
            <li><a href="turmas.php">Turmas</a></li>
            <li><a href="escolas.php">Escolas</a></li>
            <li><a href="professores.php">Notas</a></li>
            <li><a href="faltas.php">Diario</a></li>
            <li><a href="logoff.php">Sair</a></li>
        </ul>
    </div>
    
    <h1 class="text">Turmas:</h1>

<?php
    // BUSCAR TURMAS, ALUNOS E ESCOLA BASEADO NO PROFESSOR LOGADO
    $query = "SELECT 
                tb_turmas.id AS turma_id, 
                tb_turmas.nome AS turma, 
                tb_escola.nome AS escola, 
                tb_professores.nome AS professor, 
                tb_alunos.nome AS aluno
            FROM 
                tb_turmas 
            INNER JOIN 
                tb_escola ON tb_turmas.id_escola = tb_escola.id
            INNER JOIN 
                tb_professores ON tb_turmas.id_professor = tb_professores.id
            INNER JOIN 
                tb_turma_alunos ON tb_turmas.id = tb_turma_alunos.id_turma
            INNER JOIN 
                tb_alunos ON tb_turma_alunos.id_aluno = tb_alunos.id
            WHERE 
                tb_professores.id = $professor_id
            ORDER BY 
                tb_turmas.id, tb_alunos.nome";

    $resul = $mysqli->query($query);

    // Verificação da consulta
    if (!$resul) {
        die("Erro na consulta: " . $mysqli->error);
    }

    $turmas = [];

    if ($resul->num_rows > 0) {
        while ($row = $resul->fetch_assoc()) {
            $turma_id = $row['turma_id'];
            if (!isset($turmas[$turma_id])) {
                $turmas[$turma_id] = [
                    'turma' => $row['turma'],
                    'escola' => $row['escola'],
                    'professor' => $row['professor'],
                    'alunos' => []
                ];
            }
            $turmas[$turma_id]['alunos'][] = $row['aluno'];
        }
    } else {
        echo "<p>Nenhuma turma encontrada.</p>";
    }

    foreach ($turmas as $turma_id => $turma_info) {
?>
    <div class="bloco-turma">
        <h2><?php echo $turma_info['turma']; ?></h2>
        <p>Escola: <?php echo $turma_info['escola']; ?></p>
        <p>Professor: <?php echo $turma_info['professor']; ?></p>
        <p>Alunos:</p>
        <ul>
            <?php foreach ($turma_info['alunos'] as $aluno) { ?>
                <li><?php echo $aluno; ?></li>
            <?php } ?>
        </ul>
    </div>
<?php
    }
?>
    
    <footer style="margin-top: 10%;">
        <p class="fontes">© 2024 Nosso Site. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
