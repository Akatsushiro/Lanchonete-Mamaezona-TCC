<?php 
require_once '../../model/pedido/pedido.PDO.php';

$bd = new Table_Pedido();

class Pedido{

    private $valor;
    private $tipo;
    private $desconto;
    private $acrescimo;

    // ------- Getters ---------
    function getValor(){
        return $this->valor;
    }

    function getTipo(){
        return $this->tipo;
    }
    
    function getDesconto(){
        return $this->desconto;
    }

    function getAcrescimo(){
        return $this->acrescimo;
    }

    // -------- Setters ------------

    function setValor($v){
        $this->valor = $v;
    }

    function setTipo($t){
        $this->tipo = $t;
    }

    function setDesconto($d){
        $this->desconto = $d;
    }

    function setAcrescimo($a){
        $this->acrescimo = $a;
    }

// -------------------------------------------------
    function  dadosVenda($valor, $tipo, $desconto = 0, $acrescimo = 0){
        $this->setValor($valor);
        $this->setTipo($tipo);
        $this->setDesconto($desconto);
        $this->acrescimo($acrescimo);
    }

    function gerarVenda($valor, $tipo, $desconto = 0, $acrescimo = 0, $produtos){
        
    }

    function pesquisarProdutos($texto){
        global $bd;
        $dados['data'] = $bd->selectProduto($texto);
        return json_encode($dados, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
    
}