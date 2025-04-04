<?php
//FUNCIONA DA MESMA MANEIRA DA CONEXÃO QUE ESTAR LOCALIZADA NA PASTA -> php/conexao.php

$hostname = "localhost";
$bancodedados = "db_sistema_escola";
$usuario = "root";
$senha = "root";

$mysqli = new mysqli ($hostname, $usuario, $senha, $bancodedados);

if ($mysqli-> connect_errno){
    echo "falha ao conectar com o servidor:( " . $mysqli-> connect_errno.")". $mysqli-> connect_errno;
}else{
    echo "Conectado ao banco de dados";
}
?>