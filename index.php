
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
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        
    </head>
    <body>
        <?php
            require_once 'cabecalho.php';
        ?>
        
       
        
    <form class="form-horizontal" action="entrar.php" method="POST">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="E-mail / CPF: "
               name="login" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Senha</label>
    <div class="controls">
      <input type="password" id="inputPassword" placeholder="Senha: " name="senha">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">      
      <button type="submit" class="btn">Entrar</button>
    </div>
  </div>
</form>                    
        
         <div id="container">
            <img src="Logo 1.jpg" id="logo" alt="Logo da empresa" />
        </div>
        
        
        <?php
            require_once 'rodape.php';
        ?>
    </body>
</html>
