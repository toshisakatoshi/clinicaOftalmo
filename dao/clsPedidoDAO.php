<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clsPedidoDAO
 *
 * @author assparremberger
 */

include_once CAMINHO.'dao/clsConexao.php';
include_once CAMINHO.'model/clsPedido.php';

class PedidoDAO {
    //put your code here
    public static function inserir($pedido){
        $sql = "INSERT INTO pedido ( data, codUsuario) VALUES "
                . " ( '".$pedido->getData()."' , "
                . "    ".$pedido->getCliente()->getId()."  ) ";
     
        $conn = new Conexao();
        $retorno = $conn->executarComRetornoId($sql);
        return $retorno;
    }
    
    public static function getPedidoByIdCliente($idCliente){
        $sql = "SELECT p.id AS id, "
                . " DATE_FORMAT(p.data, '%d/%m/%Y %T') AS horario, "
                . " ( SELECT SUM( i.preco * i.quantidade ) FROM itens i "
                . "     WHERE codPedido = p.id ) AS total "
             . " FROM pedido p "
             . " WHERE p.codUsuario = ".$idCliente;
        $conn = new Conexao();
        $result = $conn->consultar($sql);
        $lista = new ArrayObject();
        while( list( $id, $data, $total ) = mysqli_fetch_row($result)){
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setData($data);
            $pedido->setTotal($total);
            $lista->append($pedido);
        }
        return $lista;
    }
    
}
