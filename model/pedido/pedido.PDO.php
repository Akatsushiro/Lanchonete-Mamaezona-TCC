<?php
require_once "../../model/pdo.Banco.class.php";

class Table_Pedido extends Banco{

    function selectPedidosLista(){
        global $pdo;
        $bd = new Table_Pedido();
        $bd->conectar();
        $sql = $pdo->prepare("SELECT id_produto, nome, imagem");
    }
}