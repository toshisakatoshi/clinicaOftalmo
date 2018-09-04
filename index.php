
<?php
define("CAMINHO", $_SERVER['DOCUMENT_ROOT'] . "/clincaOftalmo/");
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Clinica Oftalmo</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" >
        <link href="estilo.css" rel="stylesheet" />
    </head>
    <body>
        
            <header>
                <?php
                require_once 'cabecalho.php';
                ?>
               
            </header>
           
   
                <div id="formulario" >

                   <form action="entrar.php" method="POST">
                       <div class="form-horizontal">
                           <label class="control-label" for="inputEmail">Email: </label>
                           <input type="text" id="inputEmail" placeholder="E-mail / CPF: " name="login" >
                       </div>

                       <div class="form-horizontal">
                           <label class="control-label" for="inputPassword">Senha: </label>
                           <input type="password" id="inputPassword" placeholder="Senha: " name="senha">
                       </div>
                       <div class="form-horizontal">
                           <button type="submit" class="btn btn-success botao">Entrar</button>
                       </div>
                   </form>       
                </div>       
			<div class="container">     
            <section>    
				<div id="banner">
					<div id="myCarousel" class="carousel slide">
						
						<div class="car">

						<div class="carousel-inner">
                                                    <div class="active item"><img src="img/9.jpg"/></div>
                                                    <div class="item"><img src="img/1.jpg"/></div>
                                                    <div class="item"><img src="img/2.jpg"/></div>
                                                    <div class="item"><img src="img/3.jpg"/></div>
                                                    <div class="item"><img src="img/4.jpg"/></div>
                                                    <div class="item"><img src="img/5.jpg"/></div>
                                                    <div class="item"><img src="img/6.jpg"/></div>
                                                    <div class="item"><img src="img/7.jpg"/></div>
                                                    <div class="item"><img src="img/8.jpeg"/></div>
                                                        

						</div>

						<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
						<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
					</div>
				</div>
				
			   </div>
			<section>

        
           

            
        </div>
        
         <?php
            require_once 'rodape.php';
            ?>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
