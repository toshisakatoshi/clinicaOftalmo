<?php
    define("CAMINHO", $_SERVER['DOCUMENT_ROOT']."/clinicaOftalmo/" );
    include_once CAMINHO.'dao/clsItemDAO.php';
    include_once CAMINHO.'model/clsItem.php';

?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
           <link href="estilo.css" type="text/css" rel="stylesheet" />
        <title>Clinica Oftalmo - Itens da Baixa</title>
    </head>
     <body >
        
        <?php
            require_once 'cabecalho.php';
            
          
            
        ?>
         <h1 align="center" class="btnVisualizar">Itens da Baixa</h1>
        
       
        <br>
        
         <?php
        
        $lista = ItemDAO::getItens( $_REQUEST['idBaixa'] );
         
        if( $lista->count() == 0 ){
            echo '<h2><b>Nenhum item encontrado!</b></h2>';
        }  else {
            

          
        ?>
        
        <table border="1" width="100%">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Preco</th>
            </tr>
            
            <?php
            
            foreach ($lista as $item) {  
            ?>
            <tr>
                <td><?php echo $item->getProduto()->getId();?></td>
                <td><?php echo $item->getProduto()->getNome();?></td>
                <td><?php echo $item->getQuantidade();?></td>
                <td><?php echo $item->getPreco();?></td>
                
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
