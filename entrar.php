<?php
$login = $_POST['login'];
$senha = $_POST['senha'];

define("CAMINHO", $_SERVER['DOCUMENT_ROOT']."/clinicaOftalmo/");
include_once CAMINHO.'model/clsCliente.php'; 
include_once CAMINHO.'dao/clsClienteDAO.php'; 


$cliente = ClienteDAO::logar($login, $senha);

if( $cliente == NULL ){
    echo '<body onload="window.history.back();">';

}  else {
    
    session_start();
    
    $_SESSION['logado'] = true;
    $_SESSION['idCliente'] = $cliente->getId();
    $_SESSION['nome'] = $cliente->getNome();
    $_SESSION['admin'] = $cliente->getAdmin();
    
    
    header ( "Location: ".$_SERVER['HTTP_REFERER']);
    
}
        
        
        
        
        
        
        
        
        