<?php
require_once "../../model/pdo.Banco.class.php";
require_once "../../model/funcionario/funcionario.class.php";
/**
 * Classe responsável pelas alterações no banco na tabela funcionarios
 * 
 * @copyright (c) 2019, ETEC Jardim Ângela.
 */
class Table_Funcionario extends Banco
{
    /**
     * Verifica se o usuário existe e se sua senha bestá correta
     *
     * @param string $login Nome do usuário no sistema
     * @param string $senha Senha do usuário
     * @return int $dados Retorna 0 senão existir, 1 se existir
     */
    function login($login, $senha)
    {
        global $pdo;
        $bd = new Table_Funcionario();
        $bd->conectar();
        $sql = $pdo->prepare("SELECT * FROM funcionarios WHERE login = ? AND senha = ? AND `status` = ?");
        $sql->execute(array($login, $senha, 1));
        $dados = $sql->rowCount();
        return $dados;
    }
    /**
     * Undocumented function
     *
     * @param integer $id Código unico de identificação do usuário
     * 
     * @return array Retorna um array com os seguintes dados:
     * 
     * 0 - id do funcionario
     * 
     * 1 - nome do funcionario
     * 
     * 2 - login do funcionario
     * 
     * 3 - senha do funcionario
     * 
     * 4 - acesso
     * 
     * 5 - data de admissão
     * 
     * 6 - data de dispensa
     * 
     * 7 - status
     */
    function selectFuncionario($id)
    {
        global $pdo;
        $bd = new Table_Funcionario();
        $bd->conectar();
        $sql = $pdo->prepare("SELECT * FROM funcionarios WHERE id_funcionarios = ?");
        $sql->execute(array($id));
        while ($col = $sql->fetch(PDO::FETCH_ASSOC)) {
            $dados[] = $col['id_funcionarios'];
            $dados[] = $col['nome'];
            $dados[] = $col['login'];
            $dados[] = $col['senha'];
            $dados[] = $col['acesso'];
            $dados[] = $col['admitido'];
            $dados[] = $col['dispensa'];
            $dados[] = $col['status'];
        }
        return $dados;
    }
    /**
     * Faz o INSERT do funcionario no banco.
     *
     * @param Funcionario $Funcionario Objeto Funcionario vindo da classe funcionario.
     * @return void
     */
    function insertFuncionario(Funcionario $Funcionario)
    {
        global $pdo;
        $bd = new Table_Funcionario();
        $bd->conectar();
        $sql = $pdo->prepare("INSERT INTO funcionarios (nome, `login`, senha, acesso) VALUES (?, ?, ?, ?)");
        $sql->execute(array($Funcionario->getNome(), $Funcionario->getLogin(), $Funcionario->getSenha(), $Funcionario->getAcesso()));
    }
    /**
     * Faz o Update de um funcionário pelo seu ID
     *
     * @param int $id ID do funcionario
     * @param Funcionario $Funcionario Objeto Funcionario vindo da classe funcionario.class.
     * @return void
     */
    function updateFuncionario($id, Funcionario $Funcionario)
    {
        global $pdo;
        $bd = new Table_Funcionario();
        $bd->conectar();
        $sql = $pdo->prepare("UPDATE `funcionarios` SET nome = ?, login = ?, senha = ?, acesso = ? WHERE id_funcionarios = ?;");
        $sql->execute(array($Funcionario->getNome(), $Funcionario->getLogin(), $Funcionario->getSenha(), $Funcionario->getAcesso(), $id));
    }
}
