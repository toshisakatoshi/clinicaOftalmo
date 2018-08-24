 
<?php

session_start();
    
    if( ! isset( $_SESSION['logado']) ||  
            !$_SESSION['logado']  ) {
        header("Location: index.php");
    }  else {
     
    define("CAMINHO", $_SERVER['DOCUMENT_ROOT']."/clinicaOftalmo/" );
    include_once CAMINHO.'model/clsProduto.php';
    include_once CAMINHO.'dao/clsProdutoDAO.php';
    
    session_start();
    
    if( isset($_REQUEST['adicionar'])){
        $id = $_REQUEST['idProduto'];
        if( isset( $_SESSION['baixa'][$id] ) ){
            $_SESSION['baixa'][$id] ++;
        }  else {
            $_SESSION['baixa'][$id] = 1;
        }
        header("Location: ?");
    }
    
     if( isset($_REQUEST['retirar'])){
         $id = $_REQUEST['idProduto'];
         if( isset( $_SESSION['baixa'][$id] ) ){
             if( $_SESSION['baixa'][$id] > 1 ){
                 $_SESSION['baixa'][$id] --;
             }  else {
                 unset( $_SESSION['baixa'][$id] );
             }
         } 
         header("Location: ?");
     }
     
     
     if( isset($_REQUEST['remover'])){
         $id = $_REQUEST['idProduto'];
         if( isset( $_SESSION['baixa'][$id] ) ){
            unset( $_SESSION['baixa'][$id] );
         } 
         header("Location: ?");
     }
    
    
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Clinica Oftalmo</title>
        <link href="estilo.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <?php
            require_once 'cabecalho.php';
            
            echo '<h2>Baixa de produto</h2>';
            
            if( isset( $_SESSION['baixa'] ) && 
                    count($_SESSION['baixa']) > 0 ){
                
                echo '<a href="controller/salvarPedido.php" ><button class="flb">Finalizar Baixa</button></a>';
                
                $total = 0;
                echo '<table border="1"> ';
                echo '    <tr>';        
                echo '        <th>Nome</th>';        
                echo '        <th>Quantidade</th>';        
                echo '        <th>Preço Unitário</th>';        
                echo '        <th>Subtotal</th>';        
                echo '        <th>Excluir</th>';        
                echo '    </tr>';        
                
                foreach ($_SESSION['baixa'] as $id => $qtd) {
                    $produto = ProdutoDAO::getProdutoById($id);
                    echo '<tr>';
                    echo '  <td>'.$produto->getNome().'</td>';
                    echo '  <td> 
                                <a href="?retirar&idProduto='.$produto->getId().'">
                                    <button>-</button></a>
                                '.$qtd.'
                                <a href="?adicionar&idProduto='.$produto->getId().'">
                                    <button>+</button></a>
                            </td>';
                    echo '  <td>R$ '. str_replace('.', ',', $produto->getPreco()).'</td>';
                    $subtotal = $qtd * $produto->getPreco();
                    $total += $subtotal;
                    echo '  <td>R$ '.str_replace('.', ',', $subtotal).'</td>';
                    echo '  <td>
                                <a href="?remover&idProduto='.$produto->getId().'">
                                    <button class="exp">Excluir Produto</button>
                                </a>
                            </td>';
                    echo '</tr>';
                }       
                echo '  <tr>
                             <td colspan="3" align="right">Total: </td>
                             <td colspan="3" align="center">R$ '.str_replace('.', ',', $total).'</td>  
                        </tr>';
                echo '</table>';
                
            }  else {
                echo '<hr><h3>baixa vazia!</h3>';
            }
            
        ?>
        
     
        <?php
            require_once 'rodape.php';
        ?>
       
    </body>
</html>


<?php
    }
    