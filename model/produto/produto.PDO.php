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
        $sql->execute(array($Produto->getNome(), $Produto->getTipo(), $Produto->getMarca(), $Produto->getPreco(), $Produto->getCusto()));
        $bd->desconectar();
    }

    function updateProduto($id, Produto $Produto)
    {
        global $pdo;
        $bd = new Table_Produto();
        $bd-> conectar();
        $sql = $pdo->prepare("UPDATE produto SET nome_produto =?, tipo =?, marca =?, preco =?, custo =? WHERE id_produto =?");
        $sql->execute(array($Produto->getNome(), $Produto->getTipo(), $Produto->getMarca(), $Produto->getPreco(), $Produto->getCusto(), $id));
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

    function deleteProduto($id){
        global $pdo;
        $bd = new Table_Produto();
        $bd-> conectar();
        $sql = $pdo->prepare("UPDATE `produto` SET `status_produto` = 0 WHERE id_produto = ?");
        $sql->execute(array($id));
        $bd->desconectar();
    }

    function listarProdutosArray(){
        global $pdo;
        $bd = new Table_Produto();
        $bd-> conectar();
        $sql = $pdo->prepare("SELECT `id_produto`, `nome_produto`, `tipo`, `marca`, `preco`, `estoque_id_estoque`, `custo`, `status_produto` FROM `produto` WHERE `status_produto` = 1"); 
        $sql->execute();
        $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
        $bd->desconectar();
    }

    function listarProduto(){
        global $pdo;
        $bd = new Table_Produto();
        $bd-> conectar();
        $sql = $pdo->prepare("SELECT `id_produto`, `nome_produto`, `tipo`, `marca`, `preco`, `estoque_id_estoque`, `custo`, `status_produto` FROM `produto` WHERE `status_produto` = 1"); 
        $sql->execute();
        echo "<table class='table table-bordered table-striped text-center container'>
                <tr class='thead-dark'>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>TIPO</th>
                    <th>MARCA</th>
                    <th>PRECO</th>
                    <th>ESTOQUE</th>
                    <th>CUSTO</th>
                    <th>STATUS</th>
                    <th></th>
                </tr>";
        while($col = $sql->fetch(PDO::FETCH_ASSOC)){
            $id = $col['id_produto'];
            $nome = $col['nome_produto'];
            $tipo = $col['tipo'];
            $marca = $col['marca'];
            $preco = $col['preco'];
            $estoque = $col['estoque_id_estoque'];
            $custo = $col['custo'];
            $status = $col['status_produto'];

            echo "
                <tr>
                    <td>$id</td>
                    <td><a href='produtos.Update.php?id=$id'>$nome</a></td>
                    <td>$tipo</td>
                    <td>$marca</td>
                    <td>$preco</td>
                    <td>$estoque</td>
                    <td>$custo</td>
                    <td>$status</td>
                    <td><a href='../../controller/produto/produto.controller.php?op=delete&&id=$id'>Excluir</a></td>
                </tr>";
        }
        echo '</table>';
        $bd->desconectar();
    }
}
