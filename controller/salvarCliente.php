<?php
    define("CAMINHO", $_SERVER['DOCUMENT_ROOT']."/clinicaOftalmo/" );
    include_once CAMINHO.'model/clsCliente.php';
    include_once CAMINHO.'dao/clsClienteDAO.php';
    
    
    
    
    if( isset( $_REQUEST['excluir']) ){
        $id = $_GET['idCliente'];
        $cliente = new Cliente();
        $cliente->setId( $id );
        
        
        
        $retorno = ClienteDAO::excluir( $cliente );
        
        if( $retorno ){
            
            header("Location: ../cliente.php");
        }  else {
            header("Location: ../cliente.php?erroExcluir");
        }
        
    }  else {
        
        $senha = $_POST['senha'];
        $senha2 = $_POST['senha2'];
        
        if( $senha != $senha2 ){
             echo "<body onload='window.history.back();'>";
        }  else {
            
            $cliente = new Cliente();
            $cliente->setNome( $_POST['nome'] );
            $cliente->setTelefone( $_POST['telefone'] );
            $cliente->setEmail( $_POST['email'] );
            $cliente->setCpf( $_POST['cpf'] );
            
            if( isset($_POST['admin']) ){
                $cliente->setAdmin(1);
            }  else {
                $cliente->setAdmin(0);
            }
            
            $password = md5($senha);
            $cliente->setSenha($password);
            
            $erro = "";
            if( isset($_REQUEST["inserir"])){
               $retorno = ClienteDAO::inserir($cliente);
               if ( !$retorno ){
                   $erro = "?erroInserir";
               }
            }
            
            if( isset($_REQUEST["editar"]) ){
                $cliente->setId( $_GET['idCliente'] );
                $retorno = ClienteDAO::editar($cliente);
                if ( !$retorno ){
                   $erro = "?erroEditar";
               }
            }
            
            header("Location: ../cliente.php".$erro);
            
        }
        
    }
    
    
    
    
    
    