<?php
    define("CAMINHO", $_SERVER['DOCUMENT_ROOT']."/clinicaOftalmo/" );
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
          <link href="estilo.css" type="text/css" rel="stylesheet" />
        <title>Clinica Oftalmo</title>
    </head>
    <body>
        <?php
            require_once 'cabecalho.php';
            
            if( isset( $_SESSION['logado']) &&  
                       $_SESSION['logado'] ){
                ?>
                <form action="controller/salvarPedido.php" method="POST">
                    <legend>Forma de Pagamento:</legend>
                    <select name="pagamento">
                        <option value="0">Selecione...</option>
                        <option value="Dinheiro">Dinheiro</option>
                        <option value="Crédito">Crédito</option>
                        <option value="Débito">Débito</option>
                        <option value="TRI">TRI</option>
                    </select> 
                    <br>
                    <legend>Observações:</legend>
                    <textarea name="observacoes" placeholder="Troco? Ponto de Referência?"></textarea>
                    <br>
                    <input type="submit" value="Finalizar" />
                </form>
        
        
                <?php
            }  else {
                echo '<script> alert("Você deve fazer login"); </script>';
            }
        ?>
       
        <?php
            require_once 'rodape.php';
        ?>
    </body>
</html>
