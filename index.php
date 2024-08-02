<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_tela1.css">
    <title>Meu Php</title>
    </head>
    <body> 
            <div id="Container">
                <div id="center">
                    <form action="php/validar_login.php" method="post">
                        <img  class="img1" src="img/Minha_Escola.png" alt="">
                            <div>
                                <input  class="email"  type="text" name="login" placeholder="informe o Login">
                            </div>
                            <div>
                                <input  class="senha" type="password" name="senha" placeholder="Informe a Senha">
                            </div>
                            
                            <a class="linkpro" href="acessoprofe.php"> Professores </a>
                            <input  class="submit" type="submit" value="Enviar">

                        </form>
                </div>
            </div>
    </body>
</html>