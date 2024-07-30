<?php
include "conexao.php";

$login = $_POST['login'];
$senha = $_POST['senha'];


if(!empty($login) != "" && !empty($senha) != ""){

    $querySelect = "SELECT * FROM tb_professores  WHERE usuarioF = '$login' AND senhaF = '$senha' ";
    
    $resul = $mysqli->query($querySelect);

    if($resul->num_rows > 0){
        header("Location: /Projeto-de-Gerenciamento-Escolar/pag-professores/inicio.php");
    }
    else{
        header("Location: /Projeto-de-Gerenciamento-Escolar/acessoprofe.php");
    }
}


?>