<?php

    session_start();
    
    if( ! isset( $_SESSION['logado']) ||  
            !$_SESSION['logado']  ) {
        header("Location: index.php");
    }  else {
        
    
    define("CAMINHO", $_SERVER['DOCUMENT_ROOT']."/clinicaOftalmo/");
    include_once CAMINHO.'model/clsProduto.php';
    include_once CAMINHO.'model/clsCategoria.php';
    include_once CAMINHO.'dao/clsCategoriaDAO.php';  
    include_once CAMINHO.'dao/clsProdutoDAO.php';  
    
   
    $action = "inserir";
    
    $nome = "";
    $codigoBarras = "";
    $preco = "";
    $quantidade = "";
    $idCategoria = 0;
    
    if( isset($_REQUEST['editar']) ){
        $idProduto = $_REQUEST['idProduto'];
        
        $produto = ProdutoDAO::getProdutoById($idProduto);
    
        $nome = $produto->getNome();
        $codgoBarras = $produto->getCodigoBarras();
        $preco = $produto->getPreco();
        $quantidade = $produto->getQuantidade();
        
        $idCategoria = $produto->getCategoria()->getId();
        
        $action = "editar&idProduto=".$idProduto;
        
        
    }
    
    
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Clinca Oftalmo - Cadastrar Produto</title>
        <link href="estilo.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <?php
            require_once 'cabecalho.php';
        ?>
        <h1 align="center" class="cadcat">Cadastrar Produto</h1>
        
        <br><br>
        
        <form action="controller/salvarProduto.php?<?php echo $action; ?>" method="POST"
              enctype="multipart/form-data">
            <label>Nome: </label>
            <input type="text" name="nome" value="<?php echo $nome; ?>"  /> <br><br>
            
            <label>CodigoBarras: </label>
            <input type="number" name="codigoBarras" value="<?php echo $codgoBarras; ?>"  /> <br><br>
            
            <label>Preço: </label>
            <input type="number" name="preco" step="any" value="<?php echo $preco; ?>"  /> <br><br>     
            
            <label>Quantidade: </label>
            <input type="number" name="quantidade" value="<?php echo $quantidade; ?>"  /> <br><br> 
            
            <label>Categoria:</label>
            <select name="categoria">
                <option value="0">Selecione...</option>
                <?php
                $lista = CategoriaDAO::getCategoria();
                foreach ($lista as $categoria) {
                    $selecionar = "";
                    if( $categoria->getId() == $idCategoria){
                        $selecionar = " selected ";
                    }
                    echo '<option '.$selecionar.' value="'.$categoria->getId().'">'
                            .$categoria->getNome().'</option>';
                }
                
                ?>
            </select> <br><br> 
            
            
            <input type="submit" value="Salvar" class="catsalv" />
            <input type="reset" value="Limpar" class="catlim" />
            
        </form>
        
        
        
        <?php
            require_once 'rodape.php';
        ?>
    </body>
</html>

<?php
    }
    