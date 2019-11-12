<?php
require_once "../../model/pdo.Banco.class.php";

class Table_Estoque extends Banco
{
    function insertEstoque(Estoque $Estoque)
    {
        global $pdo;
        $bd = new Table_Estoque();
        $bd->conectar();
        $sql = $pdo->prepare("INSERT INTO `estoque`(`nome`, `marca`, `preco`, `quantia`, `quantia_min`) VALUES (?, ?, ?, ?, ?)");
        $sql->execute(array($Estoque->getNome(), $Estoque->getMarca(),  $Estoque->getPreco(),$Estoque->getQuantia(), $Estoque->getQuantia_min()));
    }

    function updateEstoque($id, Estoque $Estoque){
        global $pdo;
        $bd = new Table_Estoque();
        $bd->conectar();
        $sql = $pdo->prepare("UPDATE `estoque` SET `nome` = ?, `marca` = ?, `preco` = ?, `quantia` = ?, `quantia_min` = ? WHERE `id_estoque` = ?");
        $sql->execute(array($Estoque->getNome(), $Estoque->getMarca(),  $Estoque->getPreco(),$Estoque->getQuantia(), $Estoque->getQuantia_min(),$id));
    }

// listar cadastros do estoque
    function listarEstoque()
    {
        global $pdo;
        $bd = new Table_Estoque();
        $bd -> conectar();
        $sql = $pdo->prepare("SELECT * FROM estoque WHERE `status_estoque` = 1 ORDER BY `nome`");
        $sql->execute();
        echo "
        <table class='table table-bordered table-striped text-center container'>
            <tr class='thead-dark'>
                <th>Nome</th>
                <th>Marca</th>
                <th>preco</th>
                <th>quantia</th>
                <th>quantia_min</th>
                <th>Funções</th>
            </tr>     
        ";
        while ($col = $sql->fetch(PDO::FETCH_ASSOC)) {
            $id          = $col['id_estoque'];  
            $nome        = $col['nome'];
            $marca       = $col['marca'];
            $preco       = $col['preco'];
            $quantia     = $col['quantia'];
            $quantia_min = $col['quantia_min'];
            echo"
                <tr>
                    <td><a href='estoque.Update.php?id=$id'>$nome<a/></td>
                    <td>$marca</td>
                    <td>$preco</td>
                    <td>$quantia</td>
                    <td>$quantia_min</td>
                    <td><a href='../../controller/estoque/estoque.Excluir.php?id=$id'>Excluir</a></td>         
                </tr>
            "; 
        }
        echo "</table>";
        $bd->desconectar();
    }
    final function deleteEstoque($id)
    {
        global $pdo;
        $bd = new Table_Estoque();
        $bd->conectar();
        $sql = $pdo->prepare('UPDATE `estoque` SET `status_estoque`=? WHERE id_estoque=?');
        $sql->execute(array(0,$id));
        $bd->desconectar();
    }
    
    function selectEstoque($id){
        global $pdo;
        $bd = new Table_Estoque();
        $bd->conectar();
        $sql = $pdo->prepare("SELECT * FROM `estoque` WHERE `id_estoque` = ?");
        $sql->execute(array($id));
        while($col = $sql->fetch(PDO::FETCH_ASSOC)){
            $dados['nome']        = $col['nome'];
            $dados['marca']       = $col['marca'];
            $dados['preco']       = $col['preco'];
            $dados['quantia']     = $col['quantia'];
            $dados['quantia_min'] = $col['quantia_min'];
        }
        return $dados;
    }
}

