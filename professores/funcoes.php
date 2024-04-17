<?php 

    function buscar_professores($id, $mysqli) {
        // Consulta para buscar um professor com base no ID fornecido
        $query = "SELECT * FROM tb_professores WHERE id = ?";
        
        // Prepara a consulta
        if ($stmt = $mysqli->prepare($query)) {
            // Liga o parâmetro ID à consulta
            $stmt->bind_param("i", $id);
            
            // Executa a consulta
            $stmt->execute();
            
            // Obter o resultado
            $result = $stmt->get_result();
            
            // Verifica se encontrou um professor com o ID fornecido
            if ($result->num_rows > 0) {
                // Retorna os dados do professor como um array associativo
                return $result->fetch_assoc();
            } else {
                // Retorna null se nenhum professor foi encontrado com o ID fornecido
                return null;
            }
            
            // Fecha o statement
            $stmt->close();
        } else {
            // Retorna null em caso de erro ao preparar a consulta
            return null;
        }
    }

?>