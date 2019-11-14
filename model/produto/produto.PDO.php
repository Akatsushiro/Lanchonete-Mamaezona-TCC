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
        $sql = $pdo->prepare("INSERT INTO `produto` (`nome`, `marca`, `imagem`, `preco`, `custo`, `quantia`, `quantia_minima`, `tipo`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->execute(array($Produto->getNome(), $Produto->getMarca(), $Produto->getimagem(), $Produto->getPreco(), $Produto->getCusto(), $Produto->getQuantia(), $Produto->getQuantiaMinima(), $Produto->getTipo()));
        $bd->desconectar();
    }

    function updateProduto($id, Produto $Produto)
    {
        global $pdo;
        $bd = new Table_Produto();
        $bd-> conectar();
        $sql = $pdo->prepare("UPDATE produto SET nome = ?, marca = ?, imagem = ?, preco = ?, custo = ?, quantia = ?, quantia_minima = ?, tipo = ? WHERE id_produto = ?");
        $sql->execute(array($Produto->getNome(), $Produto->getMarca(), $Produto->getimagem(), $Produto->getPreco(), $Produto->getCusto(), $Produto->getQuantia(), $Produto->getQuantiaMinima(), $Produto->getTipo(), $id));
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
            $dados['nome']           = $col['nome'];
            $dados['marca']          = $col['marca'];
            $dados['imagem']         = $col['imagem'];
            $dados['preco']          = $col['preco'];
            $dados['custo']          = $col['custo'];
            $dados['quantia']        = $col['quantia'];
            $dados['quantia_minima'] = $col['quantia_minima'];
            $dados['tipo']           = $col['tipo'];
        }
        return $dados /*json_encode($dados)*/;
        $bd->desconectar();
    }

    //Retorna o produto para o AJAX em Json
    function selectProdutoJson($id)
    {
        global $pdo;
        $bd = new Table_Produto();
        $bd-> conectar();
        $sql = $pdo->prepare("SELECT * FROM `produto` WHERE id_produto = ?"); 
        $sql->execute(array($id));
        while ($col = $sql->fetch(PDO::FETCH_ASSOC)){
            $dados['nome']           = $col['nome'];
            $dados['marca']          = $col['marca'];
            $dados['imagem']         = $col['imagem'];
            $dados['preco']          = $col['preco'];
            $dados['custo']          = $col['custo'];
            $dados['quantia']        = $col['quantia'];
            $dados['quantia_minima'] = $col['quantia_minima'];
            $dados['tipo']           = $col['tipo'];
        }
        return '{\"data\":' . json_encode($dados) . '}';
        $bd->desconectar();
    }

    function deleteProduto($id){
        global $pdo;
        $bd = new Table_Produto();
        $bd-> conectar();
        $sql = $pdo->prepare("UPDATE `produto` SET `status` = 0 WHERE id_produto = ?");
        $sql->execute(array($id));
        $bd->desconectar();
    }


    //Retorna um array com os produtos ativos para o AJAX
    function listarProdutosArray(){
        global $pdo;
        $bd = new Table_Produto();
        $bd-> conectar();
        $sql = $pdo->prepare("SELECT * FROM `produto` WHERE `status_produto` = 1"); 
        $sql->execute();
        $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
        return "{\"data\":" . json_encode($dados) . '}';
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
                    <th>MARCA</th>
                    <th>IMAGEM</th>
                    <th>PRECO</th>
                    <th>CUSTO</th>
                    <th>QUANTIA</th>
                    <th>QUANTIA MINIMA</th>
                    <th>TIPO</th>
                    <th>STATUS</th>
                    <th>AÇÕES</th>
                </tr>";
        while($col = $sql->fetch(PDO::FETCH_ASSOC)){
            $id             = $col['id_produto'];
            $nome           = $col['nome'];
            $marca          = $col['marca'];
            $imagem         = $col['imagem'];
            $preco          = $col['preco'];
            $custo          = $col['custo'];
            $quantia        = $col['quantia'];
            $quantia_minima = $col['quantia_minima'];
            $tipo           = $col['tipo'];
            $status         = $col['status'];

            echo "
                <tr>
                    <td>$id</td>
                    <td><a href='produtos.Update.php?id=$id'>$nome</a></td>
                    <td>$marca</td>
                    <td>$imagem</td>
                    <td>$preco</td>
                    <td>$custo</td>
                    <td>$quantia</td>
                    <td>$quantia_minima</td>
                    <td>$tipo</td>
                    <td>$status</td>
                    <td><a href='../../controller/produto/produto.Excluir.php?id=$id'>Excluir</a></td>
                </tr>";
        }
        echo '</table>';
        $bd->desconectar();
    }

    function updateEstoque($quantia, $id){
        global $pdo;
        $bd = new Table_Produto();
        $bd->conectar();
        $sql = $pdo->prepare("UPDATE `produto` SET `quantia` = `quantia` + ? WHERE `id_produto` = ?");
        $sql->execute(array($quantia, $id));
        $sql = $pdo->prepare("INSERT INTO `itens_entrada` VALUES ($quantia, DEFAULT, $id)");
        $bd->desconectar();
    }
}
