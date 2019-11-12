<?php
require_once "../../model/estoque/estoque.PDO.php";
$bd = new Table_Estoque();
class Estoque
{
    private $nome;
    private $marca;
    private $preco;
    private $quantia;
    private $quantia_min;
    //Setters
    function setNome($nm)
    {
        $this->nome = $nm;
    }

    function setMarca($marca)
    {
        $this->marca = $marca;
    }
    function setPreco($preco)
    {
        $this->preco = $preco;
    }
    function setQuantia($quantia)
    {
        $this->quantia = $quantia;  
    }
    function setQuantia_min($quantia_min)
    {
        $this->quantia_min = $quantia_min;
    }
    // Getters
    function getNome()
    {
        return $this->nome;
    }
    function getMarca()
    {
        return $this->marca;
    }
    function getPreco()
    {
        return $this->preco;
    }
    function getQuantia()
    {
        return $this->quantia;
    }
    function getQuantia_min()
    {
        return $this->quantia_min;
    }
    //-------------------------------------------------------------------------------------------------------
    private function dadosEstoque($_nome, $marca, $preco, $quantia, $quantia_min)
    {
        $this->setNome($_nome);
        $this->setMarca($marca);
        $this->setPreco($preco);
        $this->setQuantia($quantia);
        $this->setQuantia_min($quantia_min);
    }
    final function cadastroEstoque($nome_, $marca, $preco, $quantia, $quantia_min)
    {
        global $bd;
        $this->dadosEstoque($nome_, $marca, $preco, $quantia, $quantia_min);
        $bd->insertEstoque($this);
    }

    function atualizarEstoque($id, $_nome, $marca, $preco, $quantia, $quantia_min){
        global $bd;
        $this->dadosEstoque($_nome, $marca, $preco, $quantia, $quantia_min);
        $bd->updateEstoque($id, $this);
    }

    function excluirEstoque($id){
        global $bd;
        $bd->deleteEstoque($id);
    }
}