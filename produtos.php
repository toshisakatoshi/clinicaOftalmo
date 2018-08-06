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
        <title>Clinica Oftalmo - Clientes</title>
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
        <h1 align="center">Produtos</h1>
        
        <a href="frmProduto.php">
            <button>Cadastrar Produtos</button></a>
        
        <br>
        <br>
        
         <?php
        
        $lista = ProdutoDAO::getProdutos();
         
        if( $lista->count() == 0 ){
            echo '<h2><b>Nenhum produto cadastrado</b></h2>';
        }  else {
            

          
        ?>
        
        <table border="1" width="100%">
            <tr>
                <th>Código</th>
                <th>Foto</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th>Editar</th>
                <th>Excluir</th>
                <th>Comprar</th>
            </tr>
            
            <?php
            
            foreach ($lista as $produto) {  
            ?>
            <tr>
                <td><?php echo $produto->getId();?></td>
                <td> 
                    <img src="fotos_produtos/<?php echo $produto->getFoto(); ?>" 
                         width="50px"  /> </td>
                <td><?php echo $produto->getNome(); ?></td>
                <td><?php echo str_replace(".", ",", $produto->getPreco() ); ?></td>
                <td><?php echo str_replace(".", ",", $produto->getQuantidade() ); ?></td>
                <td><?php echo $produto->getCategoria()->getNome(); ?></td>
                <td> <a href="frmProduto.php?editar&idProduto=<?php echo $produto->getId(); ?>"><button>Editar</button></a>  </td>
                <td> <a href="controller/salvarProduto.php?excluir&idProduto=<?php echo $produto->getId(); ?>"><button>Excluir</button></a> </td>
                <td> 
                    <a href="carrinho.php?adicionar&idProduto=<?php echo $produto->getId(); ?>"><button>Comprar</button></a> 
                </td>
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
