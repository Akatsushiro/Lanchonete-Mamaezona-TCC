<?php
require_once "../../model/pdo.Banco.class.php";

class Table_Pedido extends Banco{

    function insertPedido($valor, $tipo, $desconto = 0, $acrescimo = 0){
        global $pdo;
        $bd = new Table_Pedido();
        $bd->conectar();
        $sql = $pdo->prepare("INSERT INTO pedido (valor, tipo, desconto, acrescimo) VALUES (?, ?, ?, ?)");
        try {
            $dados = $sql->execute(array());
            $dados = $dados->fetchAll(PDO::FETCH_ASSOC);
            return $dados;
        } catch (PDOException $th) {
            echo '#Erro ao listar os produtos#';
            return $th;
        }
    }

    function selectProdutos($pesquisa){
        global $pdo;
        $bd = new Table_Pedido();
        $bd->conectar();
        $sql = $pdo->prepare("SELECT id_produto, nome, imagem, preco FROM produto WHERE nome LIKE ?");
        try {
            $dados = $sql->execute(array('%' . $pesquisa . '%'));
            $dados = $dados->fetchAll(PDO::FETCH_ASSOC);
            return $dados;
        } catch (PDOException $th) {
            echo '#Erro ao listar os produtos#';
            return $th;
        }
        $this->desconectar();
    }
}