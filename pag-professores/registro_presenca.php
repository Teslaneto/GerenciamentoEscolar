<?php
include("conexao.php");
session_start();

if (!isset($_SESSION['professor_id'])) {
    header("Location: /Projeto-de-Gerenciamento-Escolar/acessoprofe.php");
    exit();
}

$professor_id = $_SESSION['professor_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_turma = $_POST['id_turma'];
    $data = $_POST['data'];
    $presencas = $_POST['presenca'];

    foreach ($presencas as $id_aluno => $presente) {
        // Preparar a consulta SQL para inserir as presenças
        $stmt = $mysqli->prepare("INSERT INTO tb_presencas (idaluno, idturma, data, presenca, idprofessor) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iissi", $id_aluno, $id_turma, $data, $presente, $professor_id);
        $stmt->execute();
    }
    
    echo "Presenças registradas com sucesso!";
}

$query = "SELECT id, nome FROM tb_turmas WHERE id_professor = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $professor_id);
$stmt->execute();
$result = $stmt->get_result();
$turmas = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Presença</title>
    <style>
        .form-container {
            margin: 0 auto;
            margin-top: 5%;
            background-color: #fff; 
            padding: 20px; 
            border-radius: 8px; 
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2); 
            width: 400px; 
        }

        .form-header {
            margin-bottom: 20px; 
            text-align: center; 
            color: #333; 
        }

        .form-label {
            display: block; 
            margin-bottom: 5px; 
            color: #333; 
        }

        .form-input {
            width: 100%; 
            padding: 8px; 
            margin-bottom: 15px; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
        }

        .form-submit {
            background-color: #FF7B02; 
            color: white; 
            padding: 10px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
            width: 100%; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <label for="id_turma">Selecione a Turma:</label>
        <select name="id_turma" id="id_turma">
            <?php foreach ($turmas as $turma) { ?>
                <option value="<?php echo $turma['id']; ?>"><?php echo $turma['nome']; ?></option>
            <?php } ?>
        </select>

        <label for="data">Data:</label>
        <input type="date" name="data" id="data" required>

        <table>
            <tr>
                <th>Aluno</th>
                <th>Presente</th>
            </tr>
            <?php
            // Buscar alunos da turma selecionada
            if (isset($_POST['id_turma'])) {
                $id_turma = $_POST['id_turma'];
                $query = "SELECT a.id, a.nome FROM tb_alunos a JOIN tb_turma_alunos ta ON a.id = ta.id_aluno WHERE ta.id_turma = ?";
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param("i", $id_turma);
                $stmt->execute();
                $result = $stmt->get_result();
                $alunos = $result->fetch_all(MYSQLI_ASSOC);

                foreach ($alunos as $aluno) {
                    echo "<tr>";
                    echo "<td>{$aluno['nome']}</td>";
                    echo "<td><input type='checkbox' name='presenca[{$aluno['id']}]' value='P'></td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>

        <button type="submit">Registrar Presença</button>
    </form>
</body>
</html>
