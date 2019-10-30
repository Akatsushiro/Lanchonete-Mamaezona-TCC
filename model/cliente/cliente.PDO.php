<?php
require_once "../../model/security.class.php";
require_once "../../model/pdo.Banco.class.php";
require_once "../../model/cliente/cliente.PDO.php";

// Classe de CRUD da tabela Cliente
$verificar = new Seguranca();

interface iTable_Cliente
{
    public function insertCliente(Cliente $Cliente);
    public function selectCliente($id);
    public function updateCliente($id, Cliente $Cliente);
    public function deleteCliente($id);
    public function listarClientesArray();
    public function listarClientes();
}
/**
 * Classe responsável pelas alterações de cliente no banco. Aqui contém somente as 
 * consultas e comandos MySQL.
 */
class Table_Cliente extends Banco implements iTable_Cliente
{
    /**
     * Cadastra um cliente no banco.
     * 
     * @param Cliente $Cliente recebe um objeto do tipo cliente.
     */
    final function insertCliente(Cliente $Cliente)
    {
        global $pdo;
        $bd = new Table_Cliente();
        $bd->conectar();
        // verifica se os dados do cliente estão corretos e de acordo com o banco
        if ($this->verificarCliente($Cliente->getNome())) {
            $sql = $pdo->prepare("INSERT INTO `cliente`(`nome_cliente`, `situacao`, `descricao`, `tipo_cliente`) VALUES(?, ?, ?, ?)");
            $sql->execute(array($Cliente->getNome(), $Cliente->getSituacao(), $Cliente->getDescricao(), $Cliente->getTipo()));
        } else {
            return 050;
        }
        $bd->desconectar();
    }

    /**
     * Seleciona um cliente do banco pelo id e retorna seus dados.
     * 
     * @param int $id ID do cliente no banco.
     * 
     * @return array retorna um array com os dados do cliente na seguinte ordem:
     * 
     * 
     * 0 - Nome do Cliente.
     * 
     * 1 - Situação 'Se o cliente está devendo, atrasado ou positivo'.
     * 
     * 2 - Descrição.
     * 
     * 3 - Tipo 'Se o cliente é comum ou mensal'.
     * 
     * 4 - Status 'Se o cliente está ativo no sistema ou não'.
    */
    final function selectCliente($id)
    {
        global $pdo;
        $bd = new Table_Cliente();
        $bd->conectar();
        $sql = $pdo->prepare("SELECT `nome_cliente`, `situacao`, `descricao`, `tipo_cliente`, `status_cliente` FROM `cliente` WHERE id_cliente = ?");
        $sql->execute(array($id));
        while ($col = $sql->fetch(PDO::FETCH_ASSOC)) {
            $dados[] = $col['nome_cliente'];
            $dados[] = $col['situacao'];
            $dados[] = $col['descricao'];
            $dados[] = $col['tipo_cliente'];
            $dados[] = $col['status_cliente'];
        }
        return $dados;
        $bd->desconectar();
    }

    /**
     * Atualiza os dados de um cliente pelo seu ID
     * 
     * @param int $id ID co cliente respctivo no banco.
     * 
     * @param Cliente $Cliente Objeto do tipo cliente contendo as informações que serão * alteradas.
     * 
     * @return bool retorna 'true' se tudo ocorrer bem, caso não retorna o erro do  
     * MySQL 
     */
    final function updateCliente($id, Cliente $Cliente)
    {
        global $pdo;
        $bd = new Table_Cliente();
        $bd->conectar();
        $sql = $pdo->prepare('UPDATE `cliente` SET `nome_cliente`=?,`situacao`=?,`descricao`=? , `tipo_cliente` = ? WHERE id_cliente = ?');
        try {
            $sql->execute(array($Cliente->getNome(), $Cliente->getSituacao(), $Cliente->getDescricao(), $Cliente->getTipo(), $id));
            return true;
        } catch (PDOException $erro) {
            return $erro;
        }
        $bd->desconectar();
    }


    /**
     * Desativa um cliente pelo ID.
     * 
     * @param int $id ID do cliente relativo ao banco.
     */
    final function deleteCliente($id)
    {
        global $pdo;
        $bd = new Table_Cliente();
        $bd->conectar();
        $sql = $pdo->prepare("UPDATE `cliente` SET `status_cliente` = 0 WHERE `id_cliente` = ?");
        $sql->execute(array($id));
        $bd->desconectar();
    }

    /**
     * Retorna um json listando todos os cliente para que se possa utiliza-lo no AJAX.  
     */ 
    final public function listarClientesArray()
    {
        global $pdo;
        $bd = new Table_Cliente();
        $bd->conectar();
        $sql = $pdo->prepare("SELECT * FROM cliente WHERE `status_cliente` = 1 ORDER BY `nome_cliente`");
        $sql->execute();
        $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($dados);
    }

    /**
     * Listar clientes com opções de exclusão e alterar, SOMENTE PARA TESTES
     */
    final function listarClientes()
    {
        global $pdo;
        $bd = new Table_Cliente();
        $bd->conectar();
        $sql = $pdo->prepare("SELECT * FROM cliente ORDER BY `nome_cliente`");
        $sql->execute();
        $i = 0;
        echo "
        <table class='table table-bordered table-striped text-center container'>
            <tr class='thead-dark'>
                <th>ID</th>
                <th>Nome</th>
                <th>Situação</th>
                <th>Descrição</th>
                <th>tipo</th>
            </tr>
        ";
        while ($col = $sql->fetch(PDO::FETCH_ASSOC)) {
            $id        = $col['id_cliente'];
            $nome      = $col['nome_cliente'];
            $situacao  = $col['situacao'];
            $descricao = $col['descricao'];
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

    /**
     * Verifica se um cliente existe antes de Cadastra-lo.
     *
     * @param string $nome Nome do cliente que será cadastrado.
     * 
     * @return bool Caso o cliente não exista no banco ele retorna 'TRUE' se o cliente 
     * existir retorna 'FALSE'.
     */
    final function verificarCliente($nome)
    {
        global $pdo;
        $bd = new Table_Cliente();
        $bd->conectar();
        $sql = $pdo->prepare("SELECT * FROM `cliente` WHERE nome_cliente = ?");
        $sql->execute(array($nome));
        $data = $sql->rowCount();
        if ($data == 0) {
            return true;
        } else {
            return false;
        }
    }
}
