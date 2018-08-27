
<?php
    define("CAMINHO", $_SERVER['DOCUMENT_ROOT']."/clincaOftalmo/" );
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Clinica Oftalmo</title>
        <link href="logo.css" type="text/css" rel="stylesheet" />
        <link href="estilo.css" type="text/css" rel="stylesheet" />
        
    </head>
    <body>
        <?php
            require_once 'cabecalho.php';
        ?>
        <form action="entrar.php" method="POST" >
        <input type="text" 
               placeholder="E-mail / CPF: "
               name="login" />
        
        <input type="password" 
               placeholder="Senha: "
               name="senha" />
        
        <input type="submit" value="Entrar" />
            
    </form>
        <div id="container">
            <img src="Logo 1.jpg" id="logo" alt="Logo da empresa" />
        </div>
        
        
        
        
        
        
        <?php
            require_once 'rodape.php';
        ?>
    </body>
</html>
