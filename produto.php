<?php
    define("CAMINHO", $_SERVER['DOCUMENT_ROOT']."/clinicaOftalmo/" );
    include_once CAMINHO.'dao/clsProdutoDAO.php';
    include_once CAMINHO.'model/clsProduto.php';
    include_once CAMINHO.'model/clsCategoria.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Clinica Oftalmo - Cliente</title>
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
        <h1 align="center">Produto</h1>
        
        <a href="frmProduto.php">
            <button>Cadastrar Produto</button></a>
        
        <br>
        <br>
        
         <?php
         
         
         
        
        $lista = ProdutoDAO::getProdutos();
         
        if( $lista->count() == 0 ){
            echo '<h2><b>Nenhum produto cadastrado</b></h2>';
        }  else {
            
            
            
         $estoquetotal = 0;
         foreach ($lista as $produto) {  
            $estoquetotal += $produto->getPreco()*$produto->getQuantidade();
         }
         reset($lista);

          $total = 0;
        ?>
        
        <table border="1" width="100%">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>CodigoBarras</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th>Baixa</th>
                <th>Editar</th>
                <th>Excluir</th>
                
            </tr>
            
            <?php
            
            foreach ($lista as $produto) {  
                
                $total += $produto->getPreco()*$produto->getQuantidade();
                $cor = "";
                $percentual = $total/$estoquetotal;
                if( $percentual <= 0.8){
                    $cor = "#ddd";
                } else {
                    if( $percentual >0.8 && $percentual <=0.95){
                        $cor = "#0ff";
                    } else {
                        $cor = "#0f0";
                    }
                }
                
            ?>
            <tr style="background-color: <?php echo $cor; ?>">
                <td><?php echo $produto->getId(); ?></td>
                <td><?php echo $produto->getNome(); ?></td>
                <td><?php echo $produto->getCodigoBarras(); ?></td>
                <td><?php echo str_replace(".", ",", $produto->getPreco() ); ?></td>
                <td><?php echo str_replace(".", ",", $produto->getQuantidade() ); ?></td>
                <td><?php echo $produto->getCategoria()->getNome(); ?></td>
                <td> <a href="baixa.php?adicionar&idProduto=<?php echo $produto->getId(); ?>"><button class="btnEnviar">Enviar</button></a> </td>
                <td> <a href="frmProduto.php?editar&idProduto=<?php echo $produto->getId(); ?>"><button class="btnEditar">Editar</button></a>  </td>
                <td> <a href="controller/salvarProduto.php?excluir&idProduto=<?php echo $produto->getId();
                ?>"><button class="btnExluir">Excluir</button></a> </td>
                
                
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
