<?php
    define("CAMINHO", $_SERVER['DOCUMENT_ROOT']."/clinicaOftalmo/" );
    include_once CAMINHO.'dao/clsPedidoDAO.php';
    include_once CAMINHO.'model/clsPedido.php';

?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Clinica Oftalmo - Baixa de Produto</title>
        <link href="estilo.css" type="text/css" rel="stylesheet" />
    </head>
     <body onload="erro()">
        
        <?php
            require_once 'cabecalho.php';
            
            if( isset($_REQUEST['erroInserir'])){
                echo '<script> '
                   . '    function erro(){'
                   . '       alert("Erro ao inserir"); '
                   . '    } '
                   . '</script>  ';
            }
            
            if( isset($_REQUEST['erroEditar'])){
                echo '<script> '
                   . '    function erro(){'
                   . '       alert("Erro ao editar"); '
                   . '    } '
                   . '</script>  ';
            }
            
        ?>
         <h1 align="center" class="btnVisualizar">Baixa de Produto</h1>
        
       
        <br>
        
         <?php
        
        $lista = PedidoDAO::getPedidoByIdCliente( $_SESSION['idCliente'] );
         
        if( $lista->count() == 0 ){
            echo '<h2><b>Nenhum pedido encontrado!</b></h2>';
        }  else {
            

          
        ?>
        
        <table border="1" width="100%">
            <tr>
                <th>Código</th>
                <th>Data</th>
                <th>Total</th>
                <th>Itens</th>
            </tr>
            
            <?php
            
            foreach ($lista as $pedido) {  
            ?>
            <tr>
                <td><?php echo $pedido->getId();?></td>
                <td><?php echo $pedido->getData(); ?></td>
                <td><?php echo "R$ ".str_replace(".", ",", $pedido->getTotal()) ; ?>
                </td>
                <td><a href="itens.php?idBaixa=<?php echo $pedido->getId();?>" ><button class="btnVisualizar">Visualizar</button></a></td>
            </tr>
            <?php  
            }
            ?>
           
            
            
        </table>
        
       
        <?php
        }
        
        
            require_once 'rodape.php';
        ?>
    </body>
</html>
