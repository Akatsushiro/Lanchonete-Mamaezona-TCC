<?php
require_once '../../model/pdo.Banco.class.php';

class Table_Vendidos extends Banco{

    public function insertSaida($quantia, $pedido, $produto){
        global $pdo;
        $bd = new Table_Vendidos();
        $bd->conectar();
        $sql = $pdo->prepare("INSERT INTO itens_vendidos (quantia, pedidos_id_pedido, produto_id_produto) VALUES (?, ?, ?)");
        try {
            $sql->execute(array($quantia, $pedido, $produto));
            $id = $sql->lastInsertId();
        } catch (PDOException $th) {
            echo '#Erro ao inserir entrada#';
            return $th;
        }
        $bd->desconectar();
    }
}