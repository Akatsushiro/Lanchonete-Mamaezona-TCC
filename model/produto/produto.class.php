<?php
require_once "../../model/produto/produto.PDO.php";

$bd = new Table_Produto();

class Produto{
    public $nome;
    public $tipo;
    public $marca;
    public $preco;
    public $quantia_min;
    public $quantidade;

    function dadosProduto($nome_produto, $tipo_produto, $marca_, $preco_, $quantia_min_, $quantidade_){
        $this->nome = $nome_produto;
        $this->tipo = $tipo_produto;
        $this->preco = $preco_;
        $this->marca = $marca_;
        $this->quantia_min = $quantia_min_;
        $this->quantidade = $quantidade_;
    }

    function cadastroProduto($nome_produto, $tipo_produto, $marca_, $preco_, $quantia_min_, $quantidade_){
        global $bd;
        $this->dadosProduto($nome_produto, $tipo_produto, $marca_, $preco_, $quantia_min_, $quantidade_);
        $bd->insertProduto($this);

    }
}