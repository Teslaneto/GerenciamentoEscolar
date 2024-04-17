<?php

// Função para buscar uma turma pelo ID
function buscar_turma($id, $mysqli) {
    $query = "SELECT * FROM tb_turmas WHERE id = $id";
    $result = $mysqli->query($query);
    return $result->fetch_assoc();
}

// Função para criar ou atualizar uma turma
function salvar_turma($dados, $mysqli) {
    if ($dados['id']) {
        $query = "UPDATE tb_turmas SET
                  id_escola = '{$dados['id_escola']}',
                  status = '{$dados['status']}',
                  turno = '{$dados['turno']}',
                  nome = '{$dados['nome']}'
                  WHERE id = {$dados['id']}";
    } else {
        $query = "INSERT INTO tb_turmas (id_escola, status, turno, nome)
                  VALUES ('{$dados['id_escola']}', '{$dados['status']}', '{$dados['turno']}', '{$dados['nome']}')";
    }

    // Executar a consulta SQL
    $mysqli->query($query);
}

// Função para remover uma turma pelo ID
function remover_turma($id, $mysqli) {
    $query = "DELETE FROM tb_turmas WHERE id = $id";
    return $mysqli->query($query);
}

// Função para listar todas as turmas
function listar_turmas($mysqli) {
    $query = "SELECT * FROM tb_turmas";
    return $mysqli->query($query);
}
?>