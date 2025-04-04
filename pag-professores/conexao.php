<?php

$hostname = "localhost:5000";
$bancodedados = "db_sistema_escola";
$usuario = "root";
$senha = "root";

$mysqli = new mysqli ($hostname, $usuario, $senha, $bancodedados);

//RETORNA O CÓDIGO DE ERRO PARA A CHAMADA DE FUNÇÃO MAIS RECENTE
if ($mysqli-> connect_errno){
    echo "falha ao conectar com o servidor:( " . $mysqli-> connect_errno.")". $mysqli-> connect_errno;
}else{
    //CASO NÃO HAJA ERRO DE CONEXÃO
}

?>