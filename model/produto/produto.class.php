<?php
require_once "../../model/produto/produto.PDO.php";

$bd = new Table_Produto();

class Produto{
    public $nome;
    public $tipo;
    public $marca;
    public $preco;
    public $custo;

    function dadosProduto($nome_produto, $tipo_produto, $marca, $preco, $custo){
        $this->nome = $nome_produto;
        $this->tipo = $tipo_produto;
        $this->preco = $preco;
        $this->marca = $marca;
        $this->custo = $custo;
    }

    function cadastroProduto($nome_produto, $tipo_produto, $marca, $preco, $custo){
        global $bd;
        $this->dadosProduto($nome_produto, $tipo_produto, $marca, $preco, $custo);
        $bd->insertProduto($this);
    }

    function alterarProduto($id, $nome_produto, $tipo_produto, $marca, $preco, $custo){
        global $bd;
        $this->dadosProduto($nome_produto, $tipo_produto, $marca, $preco, $custo);
        $bd->updateProduto($id, $this);
    }

    function excluirProduto($id){
        global $bd;
        $bd->deleteProduto($id);
    }
}