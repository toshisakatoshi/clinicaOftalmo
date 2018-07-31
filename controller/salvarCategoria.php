<?php
    define("CAMINHO", $_SERVER['DOCUMENT_ROOT']."/clinicaOftalmo/" );
    include_once '../model/clsCategoria.php';
    include_once '../dao/clsCategoriaDAO.php';
    
    if( isset( $_REQUEST['inserir'])){
        $nome = $_POST['nome'];
        $cat = new Categoria();
        $cat->setNome($nome);
        
        $retorno = CategoriaDAO::inserir($cat);
        
        if($retorno){
            header("Location: ../categoria.php");
        }  else {
            header("Location: ../categoria.php?erroInserir");
        }
    }
    
    if ( isset($_REQUEST['excluir'])){
        $id = $_GET['idCategoria'];
        $categoria = new Categoria();
              
        $categoria->setId($id);
        
        CategoriaDAO::excluir($categoria);
        
        
        if($retorno){
            header("Location: ../categoria.php");
        }  else {
            header("Location: ../categoria.php?erroExcluir");
        }
    }
    
    
