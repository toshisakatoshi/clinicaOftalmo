
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
<!--        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">-->
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
<!--        <div id="myCarousel" class="carousel slide">

                        <div class="carousel-inner">
                            <div class="active item"><img src="img/imagem3.jpg"/></div>
                            <div class="item"><img src="img/imagem1.jpg"/></div>
                            <div class="item"><img src="img/imagem2.jpg"/></div>

                        </div>

                        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                    </div>-->
        
        
        
        
        
        
        <?php
            require_once 'rodape.php';
        ?>
<!--          </script>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.min.js"></script>-->
    </body>
</html>
