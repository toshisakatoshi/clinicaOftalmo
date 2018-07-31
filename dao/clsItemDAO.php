<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clsItemDAO
 *
 * @author assparremberger
 */
include_once CAMINHO.'dao/clsConexao.php';
include_once CAMINHO.'model/clsPedido.php';
include_once CAMINHO.'model/clsProduto.php';
include_once CAMINHO.'model/clsItem.php';
class ItemDAO {
    public static function inserir($item){
        $conn = new Conexao();
        
        $sql = "SELECT quantidade FROM produto "
                . " WHERE id = ".$item->getProduto()->getId();
        $result = $conn->consultar($sql); 
        $dados = mysqli_fetch_assoc($result);
        $quantidade = $dados["quantidade"] - $item->getQuantidade();
        
        if( $quantidade >=0 ){
            
        
        
        
        $sql = "INSERT INTO itens "
             . "( codPedido, codProduto, preco, quantidade)"
             . " VALUES ( "
                .$item->getPedido()->getId(). " , "
                .$item->getProduto()->getId(). " , "
                .$item->getProduto()->getPreco(). " , "
                .$item->getQuantidade(). " ) ";
                
        
        $conn->executar($sql);
        
        
        
        $sql = "UPDATE produto set quantidade = ".$quantidade
                . " WHERE id = ".$item->getProduto()->getId();
        $conn->executar($sql);
                
            return TRUE;
        } else {
            return FALSE;
        }
                    
    }
    
    public static function getItens( $idBaixa){
         $sql = "SELECT p.id AS id, p.nome, i.preco, i.quantidade"
                . " FROM itens i "
                . " Inner join produto p "
                . " on p.id = i.codProduto "
                . " WHERE codPedido = ".$idBaixa;
        $conn = new Conexao();
        $result = $conn->consultar($sql);
        $lista = new ArrayObject();
        while( list( $id, $nome, $preco, $qtd ) = mysqli_fetch_row($result)){
            $produto = new Produto();
            $produto->setId($id);
            $produto->setNome($nome);
            
            $item = new Item();
            $item->setProduto($produto);
            $item->setPreco($preco);
            $item->setQuantidade($qtd);
            
            $lista->append($item);
        }
        return $lista;
    }
    
}



