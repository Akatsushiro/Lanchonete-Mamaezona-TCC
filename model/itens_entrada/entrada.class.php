<?php
require_once "../../model/itens_entrada/entrada.PDO.php";

$bd = new Table_Entrada();

class Entrada{
    private $quantia;
    private $id_produto;

// Getters
    function getQuantia(){
        return $this->quantia;
    }

    function getId(){
        return $this->id_produto;
    }

// Setters
    function setQuantia($q){
        $this->quantia = $q;
    }

    function setId($id){
        $this->id_produto = $id;
    }

// ---------------------------------------------------------------

    private function dadosEntrada($id, $quantia){
        $this->setQuantia($quantia);
        $this->setId($id);
    }

    function salvarEntrada($id = -1, $quantia){
        $bd = new Table_Entrada();
        if ($id <= 0){
        } else {
            $this->dadosEntrada($id, $quantia);
            $bd->insertEntrada($id, $quantia);
        }
    }
}