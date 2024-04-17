<?php
//FUNCIONA DA MESMA MANEIRA DA CONEXÃO QUE ESTAR LOCALIZADA NA PASTA -> php/conexao.php
//AQUI FAZ A CONEÃO COM O BANCO DE DADOS CERTO

$hostname = "localhost";
$bancodedados = "db_minhaescola";
$usuario = "root";
$senha = "";

$mysqli = new mysqli ($hostname, $usuario, $senha, $bancodedados);

if ($mysqli-> connect_errno){
    echo "falha ao conectar com o servidor:( " . $mysqli-> connect_errno.")". $mysqli-> connect_errno;
}else{
    echo "Conectado ao banco de dados";
}
?>