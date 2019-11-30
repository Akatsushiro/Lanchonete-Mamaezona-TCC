<?php
require_once '../../model/itens_saida/saida.PDO.php';
$bd = new Table_Vendidos();

class saida{
    private $quantia;
    private $produto;
    private $pedido;

    // -------------- GETTERS -------------
    function getQuatia(){
        return $this->quantia;
    }

    function getProduto(){
        return $this->produto;
    }

    function getPedido(){
        return $this->pedido;
    }

    // -------------- SETTERS --------------

    function setQuantia($q){
        $this->quantia = $q;
    }

    function setProduto($p){
        $this->produto = $p;
    }

    function setPedido($p){
        $this->pedido = $p;
    }

// --------------------------------------------------

    function dadosSaida($quantia, $produto, $pedido){
        $this->setQuantia($quantia);
        $this->setProduto($produto);
        $this->setPedido($pedido);
    }

    function adicionarSaida($quantia, $produto, $pedido){
        $bd = new Table_Vendidos();
        $this->dadosSaida($quantia, $produto, $pedido);
        foreach ($produto as $key => $id) {
            $this->produto = $id;
            $bd->insertItem($this->getQuatia(), $this->getProduto, $this->getPedido());
        }
    }
}













