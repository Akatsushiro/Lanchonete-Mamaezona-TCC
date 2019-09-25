<?php

require_once "../../model/security.class.php";
require_once "../../model/pdo.Banco.class.php";
require_once "../../model/produto/produto.PDO.php";


class Table_Produto extends Banco
{
    function insertProduto(Produto $Produto)
    {
        global $pdo;
        $bd = new Table_Produto();
        $bd->conectar();
        $sql = $pdo->prepare("INSERT INTO `estoque` (`nome_produto`, `tipo`, `marca`, `preco`, `quantia_min`, `quantia`) VALUES (?, ?, ?, ?, ?, ?)");
        $sql->execute(array($Produto->nome, $Produto->tipo, $Produto->marca, $Produto->preco, $Produto->quantia_min, $Produto->quantidade));
        $bd->desconectar();
    }
}
