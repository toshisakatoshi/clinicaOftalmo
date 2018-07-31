<?php
    define("CAMINHO", $_SERVER['DOCUMENT_ROOT']."/clinicaOftalmo/" );
    include_once CAMINHO.'model/clsCategoria.php';
    include_once CAMINHO.'model/clsProduto.php';
    include_once CAMINHO.'dao/clsProdutoDAO.php';
    
    
    
    if( isset( $_REQUEST['excluir']) ){
        $id = $_GET['idProduto'];
        $produto = new Produto();
        $produto->setId( $id );
        
      
        
        $retorno = ProdutoDAO::excluir( $produto );
        
        if( $retorno ){
           
            header("Location: ../produto.php");
        }  else {
            header("Location: ../produto.php?erroExcluir");
        }
        
    }  else {
        


        $produto = new Produto();
        $produto->setNome( $_POST['nome'] );
        $produto->setCodigoBarras( $_POST['codigoBarraas'] );
        $produto->setPreco( $_POST['preco'] );
        $produto->setQuantidade( $_POST['quantidade'] );
        $cat = new Categoria();
        $cat->setId( $_POST['categoria'] );

        $produto->setCategoria( $cat );

        $erro = "";
        if( isset($_REQUEST["inserir"])){
           $retorno = ProdutoDAO::inserir($produto);
           if ( !$retorno ){
               $erro = "?erroInserir";
           }
        }

        if( isset($_REQUEST["editar"]) ){
            $produto->setId( $_GET['idProduto'] );
            $retorno = ProdutoDAO::editar($produto);
            if ( !$retorno ){
               $erro = "?erroEditar";
           }
        }

        header("Location: ../produto.php".$erro);


        
    }
    