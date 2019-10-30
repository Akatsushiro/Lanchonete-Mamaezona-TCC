<?php

require_once "funcionario.PDO.php";
$bd = new Table_Funcionario();

/**
 * Classe que representa um funcionário, faz a verificação dos dados antes de qualquer alteração no banco, para qualquer tarefa relacionada ao funcionario deve ser criada nesta classe.
 */
class Funcionario
{
    /**
     * @var string $nome nome do funcionario
     * 
     * @var string $login nome do usuario no sistema
     * 
     * @var string $senha senhado usuario
     * 
     * @var string $acesso define nivel de acesso de usuário
     */
    private $nome;
    private $login;
    private $senha;
    private $acesso;

    // ------------------ Getters ---------------
    function getNome()
    {
        return $this->nome;
    }

    function getLogin()
    {
        return $this->login;
    }

    function getSenha()
    {
        return $this->senha;
    }

    function getAcesso()
    {
        return $this->acesso;
    }

    // --------------------- Setters ---------------
    function setNome($n)
    {
        $this->nome = $n;
    }

    function setLogin($l)
    {
        $this->login = $l;
    }

    function setSenha($s)
    {
        $this->senha = $s;
    }

    function setAcesso($a)
    {
        $this->acesso = $a;
    }
    // --------------------------------------------------

    /**
     * Insere os dados em um objeto funcionario
     * 
     * @var string $nome nome do funcionario
     * 
     * @var string $login nome do usuario no sistema
     * 
     * @var string $senha senhado usuario
     * 
     * @var string $acesso define nivel de acesso de usuário
     * 
     * @return void
     */
    function dadosFuncionario($nome, $login, $senha, $acesso = 'CM')
    {
        $this->setNome($nome);
        $this->setLogin($login);
        $this->setSenha($senha);
        $this->setAcesso($acesso);
    }

    /**
     * Realiza o login do usuário, caso o login e a senha estejam corretos,
     * abre uma sessão para o usuario.
     *
     * @param string $login nome do usuario no sistema
     * @param string $senha senha do usuario
     * @return void
     */
    function logar($login, $senha)
    {
        require_once "../../model/pdo.Banco.class.php";
        global $bd;
        $dados = $bd->login($login, $senha);
        if ($dados == 1) {
            $dados = $bd->selectFuncionario($login, $senha);
            print_r($dados);
            session_start();
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
            $_SESSION['acesso'] = $dados[4];
            if ($_SESSION['acesso'] == "CM") {
                header("location: ../../view/funcionario/funcionario.Usuario.php");
            } else if ($_SESSION['acesso'] == "US") {
                header("location: ../../view/funcionario/funcionario.Gerente.php");
            } else {
                session_destroy();
                header("location: ../../view/funcionario/funcionario.Main.php");
            }
        } else {
            session_destroy();
            header("location: ../../view/login.php");
        }
    }

    /**
     * Testa se o login foi realizado checando as variaveis de sessão e as comparando no banco, se não estiverem definidas ou não baterem no banco a sessãoe destruida.
     *
     * @return void
     */
    function log_teste()
    {
        global $bd;

        if (!isset($_SESSION)) {
            header("../../view/logar.php");
        } else {

            if (!isset($_SESSION['login']) && !isset($_SESSION['senha'])) {
                header("../../view/logar.php");
            } else {
                $dados = $bd->selectFuncionario($_SESSION['login'], $_SESSION['senha']);
                if ($dados[2] != $_SESSION['login'] || $dados[3] != $_SESSION['senha']) {
                    session_destroy();
                    header("../../view/logar.php");
                }
            }
        }
    }

    /**
     * Verifica os dados do funcionário antes de inserir no objeto, caso corretos o os envia para serem salvos no banco.
     * 
     * @var string $nome nome do funcionario
     * 
     * @var string $login nome do usuario no sistema
     * 
     * @var string $senha senhado usuario
     * 
     * @var string $acesso define nivel de acesso de usuário
     * 
     * @return void
     */
    function salvarFuncionario($nome, $login, $senha, $acesso = 'CM')
    {
        global $bd;
        $this->dadosFuncionario($nome, $login, $senha, $acesso);
        $bd->insertFuncionario($this);
    }
}
