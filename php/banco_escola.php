<?php

//ESTAMOS INCLUINDO ARQUIVOS EXTERNOS AO NOSSO SCRIPT
include('conexao_escolas.php');
include('funcoes.php');



//VERIFICA SE O BOTÃO DE SALVA FOI CLICADO
//isset VERIFICAR SE A VARIAVEL $_POST['salvar'] ESTÁ DEFINIDA.
if (isset($_POST['salvar'])) {

    // OBTÉM DADOS DO FORMULARIO
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $inep = $_POST['inep'];
    $status = $_POST['status'];
    
    //VERIFICA SE A VARIAVEL ESTÁ DEFINIDA E NÃO É VAZIA
    if ($id) {

        //ATUALIZA UMA ESCOLA EXISTENTE
        //query -> ele armazena a consulta SQL e é uma instrução UPDATE que é usada para atualizar
        $query = "UPDATE tb_escola SET nome='$nome', endereco='$endereco', inep='$inep', status='$status' WHERE id='$id'";
    } else {

        
        //DEFINIMOS UMA CONSULTA SQL PARA INSERIR UMA NOVA ESCOLA
        $query = "INSERT INTO tb_escola (nome, endereco, inep, status) VALUES ('$nome', '$endereco', '$inep', '$status')";
    }

    //->query ele executar uma consulta SQL no banco de dados
    //chamando o método query() no objeto $mysqli para executar a consulta SQL armazenada na variável $query. 
    // Executa a consulta
    
    if ($mysqli->query($query)) {
        echo "Operação realizada com sucesso.";
        header("Location: visualizar.php");
        exit();
    } else {
        echo "Erro ao realizar a operação: " . $mysqli->error;
    }
}

// Fecha a conexão com o banco de dados para liberar os recursos
$mysqli->close();
?>