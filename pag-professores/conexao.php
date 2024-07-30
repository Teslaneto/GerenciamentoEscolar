<?php

$hostname = "localhost";
$bancodedados = "db_minhaescola";
$usuario = "root";
$senha = "";

$mysqli = new mysqli ($hostname, $usuario, $senha, $bancodedados);

//RETORNA O CÓDIGO DE ERRO PARA A CHAMADA DE FUNÇÃO MAIS RECENTE
if ($mysqli-> connect_errno){
    echo "falha ao conectar com o servidor:( " . $mysqli-> connect_errno.")". $mysqli-> connect_errno;
}else{
    //CASO NÃO HAJA ERRO DE CONEXÃO
    echo "Conectado ao banco de dados";
}

?>