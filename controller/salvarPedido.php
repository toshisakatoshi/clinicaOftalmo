<?php

    define("CAMINHO", $_SERVER['DOCUMENT_ROOT']."/clinicaOftalmo/" );
    include_once CAMINHO.'model/clsPedido.php';
    include_once CAMINHO.'model/clsProduto.php';
    include_once CAMINHO.'model/clsItem.php';
    include_once CAMINHO.'model/clsCliente.php';
    include_once CAMINHO.'dao/clsPedidoDAO.php';
    include_once CAMINHO.'dao/clsProdutoDAO.php';
    include_once CAMINHO.'dao/clsItemDAO.php';
    
    $cliente = new Cliente();
    session_start();
    $cliente->setId( $_SESSION['idCliente'] );
    
    $data = date("Y-m-d H:i:s");
    
    $pedido = new Pedido();
    $pedido->setCliente($cliente);
    $pedido->setData($data);
   
    $idPedido = PedidoDAO::inserir($pedido);
    $pedido->setId($idPedido);
    
    foreach ($_SESSION['baixa'] as $idProduto => $qtd) {
        $produto = ProdutoDAO::getProdutoById($idProduto);
        
        $item = new Item();
        $item->setPedido($pedido);
        $item->setProduto($produto);
        $item->setQuantidade($qtd);
        
        $retorno = ItemDAO::inserir($item);
        
        if( !$retorno){
            echo '<script>alert("Erro ao inserir o item");</script>';
        }
    }
    
    unset($_SESSION['baixa']);
    
    
    header("Location: ../produto.php");
    
    
    

