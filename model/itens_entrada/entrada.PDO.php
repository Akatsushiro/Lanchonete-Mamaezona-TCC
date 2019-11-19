<?php
require_once "../../model/pdo.Banco.class.php";

class Table_Entrada extends Banco{

    function insertEntrada($id, $quantia){
        global $pdo;
        $bd = new Table_Entrada();
        $bd->conectar();
        $sql = $pdo->prepare("INSERT INTO itens_entrada (quantia, produto_id_produto) VALUES (?, ?)");
        $sql->execute(array($quantia, $id));
    }
}