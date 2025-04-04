<?php
//AQUI FAZ A CONEXAO COM O BANCO DE DADOS DE LOGIN
//LOGIN: admin SENHA: admin

//ENDEREÇO DO SERVIDO NESSE CASO É O DA MAQUINA
$hostname = "localhost";

//BANCO DE DADOS AO QUAL NOS CONECTAMOS
$bancodedados = "db_sistema_escola";

//NOME PADRÃO DO USUÁRIO, ADMISTRATIVO
$usuario = "root";

//A SENHA POR PADRÃO SEMPRE É VAZIA
$senha = "";

//CRIA UM NOVO OBJETO MYSQLI QUE ESTABELECER CONEXÃO COM O BANCO DE DADOS
$mysqli = new mysqli ($hostname, $usuario, $senha, $bancodedados);

//RETORNA O CÓDIGO DE ERRO PARA A CHAMADA DE FUNÇÃO MAIS RECENTE
if ($mysqli-> connect_errno){
    echo "falha ao conectar com o servidor:( " . $mysqli-> connect_errno.")". $mysqli-> connect_errno;
}else{
    //CASO NÃO HAJA ERRO DE CONEXÃO
    echo "Conectado ao banco de dados";
}

?>