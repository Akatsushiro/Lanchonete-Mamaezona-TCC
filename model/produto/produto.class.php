<?php
require_once "../../model/produto/produto.PDO.php";

$bd = new Table_Produto();

interface iProduto
{ }

class Produto
{
    private $nome;
    private $marca;
    private $imagem;
    private $preco;
    private $custo;
    private $quantia;
    private $quantia_minima;
    private $tipo;

    // -------------- GETTERS ---------------
    function getNome()
    {
        return $this->nome;
    }

    function getMarca()
    {
        return $this->marca;
    }

    function getimagem()
    {
        return $this->imagem;
    }

    function getPreco()
    {
        return $this->preco;
    }

    function getCusto()
    {
        return $this->custo;
    }

    function getQuantia()
    {
        return $this->quantia;
    }

    function getQuantiaMinima()
    {
        return $this->quantia_minima;
    }

    function getTipo()
    {
        return $this->tipo;
    }

    // --------- SETTERS ------------
    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function setMarca($marca)
    {
        $this->marca = $marca;
    }

    function setImagem($img)
    {
        $this->imagem = $img;
    }

    function setPreco($preco)
    {
        $this->preco = $preco;
    }

    function setCusto($custo)
    {
        $this->custo = $custo;
    }

    function setQuantia($q)
    {
        $this->quantia = $q;
    }

    function setQuantiaMinima($qm)
    {
        $this->quantia_minima = $qm;
    }

    function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    // -------------- Métodos ---------------- 

    private function dadosProduto($nome, $marca, $imagem, $preco, $custo, $quantia, $quantia_minima, $tipo)
    {
        $this->setNome($nome);
        $this->setMarca($marca);
        $this->setImagem($imagem);
        $this->setPreco($preco);
        $this->setCusto($custo);
        $this->setQuantia($quantia);
        $this->setQuantiaMinima($quantia_minima);
        $this->setTipo($tipo);
    }

    function cadastroProduto($nome, $marca, $imagem, $preco, $custo, $quantia, $quantia_minima, $tipo)
    {
        global $bd;
        $this->dadosProduto($nome, $marca, $imagem, $preco, $custo, $quantia, $quantia_minima, $tipo);
        $bd->insertProduto($this);
    }

    function alterarProduto($id, $nome, $marca, $imagem, $preco, $custo, $quantia, $quantia_minima, $tipo)
    {
        global $bd;
        $this->dadosProduto($nome, $marca, $imagem, $preco, $custo, $quantia, $quantia_minima, $tipo);
        $bd->updateProduto($id, $this);
    }

    function excluirProduto($id)
    {
        global $bd;
        $bd->deleteProduto($id);
    }

    function adicionarEstoque($quantia, $id){
        global $bd;
        $bd->updateEstoque($quantia, $id);
    }
}
