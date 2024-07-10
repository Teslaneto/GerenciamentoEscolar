<?php

function getcontar_escolar($mysqli) {
    $query_select = "SELECT id FROM tb_escola";
    $query = $mysqli->prepare($query_select);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $ids = array();
        while ($row = $result->fetch_assoc()) {
            $ids[] = $row['id'];
        }
        $total = count($ids);
        return array('ids' => $ids, 'total' => $total);
    } else {
        return array('ids' => array(), 'total' => 0);
    }

    $query->close();
}

function getcontar_totalTurmas($mysqli){
    $query_select = "SELECT id FROM tb_turmas";
    $query = $mysqli->prepare($query_select);
    $query->execute();

    $result = $query->get_result();

    if($result->num_rows > 0){
        $ids = array();
        while($row = $result->fetch_assoc()){
            $ids[] = $row['id'];
        }
        $total = count($ids);
        return array('ids' => $ids, 'total' => $total);
    }
    else{
        return array('ids' => array(), 'total' => 0);
    }
}

function buscar_escola($id, $mysqli) {
    $query = "SELECT * FROM tb_escola WHERE id = ?";
    //prepare() no objeto $mysqli para preparar a consulta SQL ($query).
    $stmt = $mysqli->prepare($query);
    //bind_param associar os parâmetro à consulta preparada.
    $stmt->bind_param("i", $id);
    //executar a consulta preparada.
    $stmt->execute();
    $result = $stmt->get_result();
    $escola = $result->fetch_assoc();
    $stmt->close();
    return $escola;
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Chama a função buscar_escola para obter os dados da escola
    $escola = buscar_escola($id, $mysqli);

    // Agora você pode usar os dados da escola
    $nome = $escola['nome'];
    $endereco = $escola['endereco'];
    $inep = $escola['inep'];
    $status = $escola['status'];
}

?>