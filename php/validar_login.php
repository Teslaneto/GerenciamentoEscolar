<?php
include('conexao.php');
session_start();

// Verifica se o login foi enviado via método POST
if(isset($_POST['login'])) {
    $login = $_POST['login'];

    // Query para verificar se o login existe no banco de dados
    $query_select = "SELECT login FROM tb_admin WHERE login = '$login'";

    // Executa a query
    $result = $mysqli->query($query_select);

    // Verifica os dados
    if ($result->num_rows > 0) {
        echo "O login '$login' existe no banco de dados.";
        $_SESSION['autenticar'] = 'SIM';
        header("Location: /projetoMinhaescola/principal.php");
    } else {
        $_SESSION['autenticar'] = 'NAO';
        header("Location: /projetoMinhaescola/index.php");  
    }
} else {
    echo "O login não foi enviado.";
    $_SESSION['autenticar'] = 'NAO';
    header("Location: /projetoMinhaescola/index.php");
}
?>