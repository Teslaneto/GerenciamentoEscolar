<?php

//AQUI INICIAMOS UMA SESSÃO POIS É NECESSARIO PARA MANIPULAR SESSÕES PHP
session_start();

//AQUI DESTROI TODAS AS INFORMAÇÕES DA SESSÃO ATUAL E NOS REDIRECINAR PARA A PAGINA DE LOGIN
session_destroy();
header('Location: /Projeto-de-Gerenciamento-Escolar/acessoprofe.php');


?>