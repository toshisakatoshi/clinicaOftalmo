<?php

/**
 * Description of clsCategoria
 *
 * @author assparremberger
 */
class Produto {
    private $id;
    private $nome;
    private $codigoBarras;
    private $preco;
    private $quantidade;
    private $categoria;
    
    
    
    public function getPreco() {
        return $this->preco;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }
        
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function getCodigoBarras() {
        return $this->codigoBarras;
    }

    function setCodigoBarras($codigoBarras) {
        $this->codigoBarras = $codigoBarras;
    }



}
