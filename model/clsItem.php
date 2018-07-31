<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clsItem
 *
 * @author assparremberger
 */
class Item {
    //put your code here
    private $id;
    private $pedido;
    private $produto;
    private $preco;
    private $quantidade;
    
    public function getId() {
        return $this->id;
    }

    public function getPedido() {
        return $this->pedido;
    }

    public function getProduto() {
        return $this->produto;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPedido($pedido) {
        $this->pedido = $pedido;
    }

    public function setProduto($produto) {
        $this->produto = $produto;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }


    
}
