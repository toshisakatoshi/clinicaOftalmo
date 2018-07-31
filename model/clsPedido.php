<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clsPedido
 *
 * @author assparremberger
 */
class Pedido {
    //put your code here
    private $id;
    private $data;
    private $cliente;
    private $observacoes;
    private $pagamento;
    private $total;
    
    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

        
    
    public function getId() {
        return $this->id;
    }

    public function getData() {
        return $this->data;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getObservacoes() {
        return $this->observacoes;
    }

    public function getPagamento() {
        return $this->pagamento;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setObservacoes($observacoes) {
        $this->observacoes = $observacoes;
    }

    public function setPagamento($pagamento) {
        $this->pagamento = $pagamento;
    }


    
}