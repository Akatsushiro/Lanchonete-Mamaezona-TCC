<?php
require_once "../../model/produto/produto.PDO.php";

$bd = new Table_Produto();

class Produto{
    public $nome;
    public $tipo;
    public $marca;
    public $preco;
    public $custo;

    function dadosProduto($nome_produto, $tipo_produto, $marca_, $preco_, $custo){
        $this->nome = $nome_produto;
        $this->tipo = $tipo_produto;
        $this->preco = $preco_;
        $this->marca = $marca_;
        $this->custo = $custo;
    }

    function cadastroProduto($nome_produto, $tipo_produto, $marca_, $preco_, $custo){
        global $bd;
        $this->dadosProduto($nome_produto, $tipo_produto, $marca_, $preco_, $custo);
        $bd->insertProduto($this);
    }
}