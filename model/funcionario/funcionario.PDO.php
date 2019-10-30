<?php
require_once "../../model/pdo.Banco.class.php";
require_once "../../model/funcionario/funcionario.class.php";
class Table_Funcionario extends Banco{
    
    function login($login, $senha){
        global $pdo;
        $bd = new Table_Funcionario();
        $bd->conectar();
        $sql = $pdo->prepare("SELECT * FROM funcionarios WHERE login = ? AND senha = ? AND `status` = ?");
        $sql->execute(array($login, $senha, 1));
        $dados = $sql->rowCount();
        return $dados;
    }

    function selectFuncionario($login = -0, $senha = -0, $id = -0){
        global $pdo;
        $bd = new Table_Funcionario();
        $bd->conectar();
        $sql = $pdo->prepare("SELECT * FROM funcionarios WHERE login = ? AND senha = ? AND `status` = ?");
        $sql->execute(array($login, $senha, 1));
        while($col = $sql->fetch(PDO::FETCH_ASSOC)){
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

    function insertFuncionario(Funcionario $Funcionario){
        global $pdo;
        $bd = new Table_Funcionario();
        $bd->conectar();
        $sql = $pdo->prepare("INSERT INTO funcionarios (nome, `login`, senha, acesso) VALUES (?, ?, ?, ?)");
        $sql->execute(array($Funcionario->getNome(), $Funcionario->getLogin(), $Funcionario->getSenha(), $Funcionario->getAcesso()));
    }
//oauth
    function updateFuncionario($id, Funcionario $Funcionario){
        global $pdo;
        $bd = new Table_Funcionario();
        $bd->conectar();
        $sql = $pdo->prepare("UPDATE `funcionarios` SET nome = ?, login = ?, senha = ?, acesso = ? WHERE id_funcionarios = ?;");
        $sql->execute(array($Funcionario->getNome(), $Funcionario->getLogin(), $Funcionario->getSenha(), $Funcionario->getAcesso(), $id));
    }
}
