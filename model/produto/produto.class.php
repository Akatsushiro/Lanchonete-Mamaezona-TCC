<?php
require_once "../../model/produto/produto.PDO.php";

$bd = new Table_Produto();

interface iProduto{

}

class Produto{
    private $nome;
    private $tipo;
    private $marca;
    private $preco;
    private $custo;

// -------------- GETTERS ---------------
    function getNome(){
        return $this->nome;
    }

    function getTipo(){
        return $this->tipo;
    }

    function getMarca(){
        return $this->marca;
    }

    function getPreco(){
        return $this->preco;
    }

    function getCusto(){
        return $this->custo;
    }
// --------- SETTERS ------------
    function setNome($nome){
        $this->nome = $nome;
    }

    function setTipo($tipo){
        $this->tipo = $tipo;
    }

    function setMarca($marca){
        $this->marca = $marca;
    }

    function setPreco($preco){
        $this->preco = $preco;
    }

    function setCusto($custo){
        $this->custo = $custo;
    }

// -------------- Métodos ---------------- 

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