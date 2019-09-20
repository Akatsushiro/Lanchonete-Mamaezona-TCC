<?php
require_once "../../model/security.class.php";
require_once "../../model/pdo.Banco.class.php";

// Classe de CRUD da tabela Cliente
$verificar = new Seguranca();

class Table_Cliente extends Banco
{
    function insertCliente(Cliente $Cliente) //object Cliente
    {
        global $pdo;
        global $verificar;
        $bd = new Banco();
        $bd->conectar();
        // verifica se os dados do cliente estão corretos e de acordo com o banco
        if ($verificar->clienteTestes($Cliente)) {
            if($this->verificarCliente($Cliente->getNome())){
                $sql = $pdo->prepare("INSERT INTO `cliente`(`nome_cliente`,`situacao`,`descricao_cliente`)VALUES(?, ?, ?)");
                $sql->execute(array($Cliente->getNome(), $Cliente->getSituacao(),  $Cliente->getDescricao()));    
            }else{
                return "Usuário já existe";
            }
        }else{
            return "Existem erros nos dados, digite novamente";       
        }
        $bd->desconectar();
    }

    function selectCliente($id)
    {
        global $pdo;
        $bd = new Banco();
        $bd->conectar();
        $sql = $pdo->prepare("SELECT `nome_cliente`, `situacao`, `descricao_cliente` FROM `cliente` WHERE id_cliente = ?");
        $sql->execute(array($id));
        $cliente = $sql->fetchAll();
        foreach ($cliente as $v) {
            $dados[] = $cliente[0][0];
            $dados[] = $cliente[0][1];
            $dados[] = $cliente[0][2];
        }
        return $dados;
        $bd->desconectar();
    }
    function verificarCliente($nome){
        global $pdo;
        $bd = new Banco();
        $bd->conectar();
        $sql = $pdo->prepare("SELECT `nome_cliente`, `situacao`, `descricao_cliente` FROM `cliente` WHERE nome_cliente = ?");
        $sql->execute(array($nome));
        $data = $sql->rowCount();
        if($data == 0){
            return true;
        }else{
            return false;
        }
    }
    
    function updateCliente($id, $Cliente)
    {
        global $pdo;
        $bd = new Banco();
        $bd->conectar();
        $sql = $pdo->prepare('UPDATE `cliente` SET `nome_cliente`=?,`situacao`=?,`descricao_cliente`=? WHERE id_cliente = ?');
        try {
            $sql->execute(array($Cliente->getNome(), $Cliente->getSituacao(), $Cliente->getDescricao(), $id));
        } catch (PDOException $erro) {
            echo $erro;
        }
        $bd->desconectar();
    }

    function deleteCliente($id)
    {
        global $pdo;
        $bd = new Banco();
        $bd->conectar();
        $sql = $pdo->prepare("DELETE FROM `cliente` WHERE id_cliente = ?");
        $sql->execute(array($id));
        $bd->desconectar();
    }

    function listarClientes()
    {
        global $pdo;
        $bd = new Banco();
        $bd->conectar();
        $sql = $pdo->prepare("SELECT * FROM cliente ORDER BY `id_cliente`");
        $sql->execute();
        $dados = $sql->fetchAll();
        $i = 0;
        echo "
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Situação</th>
                <th>Descrição</th>
                <th></th>
            </tr>
        ";
        foreach ($dados as $l) {
            $id        = $dados[$i]['id_cliente'];
            $nome      = $dados[$i]['nome_cliente'];
            $situacao  = $dados[$i]['situacao'];
            $descricao = $dados[$i]['descricao_cliente'];
            echo "
                <tr>
                    <td>$id</td>
                    <td><a href = 'cliente.Update.php?id=$id'>$nome</a></td>
                    <td>$situacao</td>
                    <td>$descricao</td>
                    <td><a href='../../controller/cliente/cliente.controller.php?op=delete&id=$id'>Excluir</a></td>
                </tr>
            ";
            $i++;
        }
        echo "</table>";
        $bd->desconectar();
    }
}
