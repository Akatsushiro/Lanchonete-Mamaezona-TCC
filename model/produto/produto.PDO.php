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
        $sql = $pdo->prepare("INSERT INTO `produto` (`nome_produto`, `tipo`, `marca`, `preco`, `custo`) VALUES (?, ?, ?, ?, ?)");
        $sql->execute(array($Produto->nome, $Produto->tipo, $Produto->marca, $Produto->preco, $Produto->custo));
        $bd->desconectar();
    }

    function updateProduto($id, Produto $Produto)
    {
        global $pdo;
        $bd = new Table_Produto();
        $bd-> conectar();
        $sql = $pdo->prepare("UPDATE produto SET nome_produto =?, tipo =?, marca =?, preco =?, custo =? WHERE id_produto =?");
        $sql->execute(array($Produto->nome, $Produto->tipo, $Produto->marca, $Produto->preco, $Produto->custo, $id));
        $bd->desconectar();
    }

    function selectProduto($id)
    {
        global $pdo;
        $bd = new Table_Produto();
        $bd-> conectar();
        $sql = $pdo->prepare("SELECT * FROM `produto` WHERE id_produto = ?"); 
        $sql->execute(array($id));
        while ($col = $sql->fetch(PDO::FETCH_ASSOC)){
            $dados[] = $col ['nome_produto'];
            $dados[] = $col ['tipo'];
            $dados[] = $col ['marca'];
            $dados[] = $col ['preco'];
            $dados[] = $col ['custo'];
        }
        return $dados;
        $bd->desconectar();
    }
}
