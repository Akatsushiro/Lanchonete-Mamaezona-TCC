<?php
require_once "../../model/security.class.php";
require_once "../../model/pdo.Banco.class.php";
require_once "../../model/cliente/cliente.PDO.php";

// Classe de CRUD da tabela Cliente
$verificar = new Seguranca();

interface iTable_Cliente{
    
    public function insertCliente(Cliente $Cliente);
    public function selectCliente($id);
    public function updateCliente($id, $Cliente);
    public function deleteCliente($id);
    public function listarClientes();
    
}

class Table_Cliente extends Banco implements iTable_Cliente
{
    final function insertCliente(Cliente $Cliente) //object Cliente
    {
        global $pdo;
        global $verificar;
        $bd = new Table_Cliente();
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

    final function selectCliente($id)
    {
        global $pdo;
        $bd = new Table_Cliente();
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

    final function verificarCliente($nome){
        global $pdo;
        $bd = new Table_Cliente();
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
    
    final function updateCliente($id, $Cliente)
    {
        global $pdo;
        $bd = new Table_Cliente();
        $bd->conectar();
        $sql = $pdo->prepare('UPDATE `cliente` SET `nome_cliente`=?,`situacao`=?,`descricao_cliente`=? WHERE id_cliente = ?');
        try {
            $sql->execute(array($Cliente->getNome(), $Cliente->getSituacao(), $Cliente->getDescricao(), $id));
        } catch (PDOException $erro) {
            echo $erro;
        }
        $bd->desconectar();
    }

    final function deleteCliente($id)
    {
        global $pdo;
        $bd = new Table_Cliente();
        $bd->conectar();
        $sql = $pdo->prepare("DELETE FROM `cliente` WHERE id_cliente = ?");
        $sql->execute(array($id));
        $bd->desconectar();
    }

    final function listarClientes()
    {
        global $pdo;
        $bd = new Table_Cliente();
        $bd->conectar();
        $sql = $pdo->prepare("SELECT * FROM cliente ORDER BY `id_cliente`");
        $sql->execute();
        $dados = $sql->fetchAll();
        $i = 0;
        echo "
        <table class='table table-bordered table-striped text-center container'>
            <tr class='thead-dark'>
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
