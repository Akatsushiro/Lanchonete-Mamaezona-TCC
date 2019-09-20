<?php
require_once "cliente.PDO.php";
$bd = new table_cliente();
class Cliente
{
    private $nome;
    private $situacao;
    private $descricao;

    // Getters

    function getNome()
    {
        return $this->nome;
    }

    function getSituacao()
    {
        return $this->situacao;
    }

    function getDescricao()
    {
        return $this->descricao;
    }

    // Setters

    function setNome($n)
    {
        $this->nome = $n;
    }


    function setSituacao($s)
    {
        $this->situacao = $s;
    }


    function setDescricao($d)
    {
        $this->descricao = $d;
    }

    // ----------------------------------------------------------------

    // Define os dados de um Cliente
    function dadosCliente($nome, $situacao, $descricao)
    {
        $this->setNome($nome);
        $this->setSituacao($situacao);
        $this->setDescricao($descricao);
    }

    function cadastroCliente($nome, $situacao, $descricao)
    {
        global $bd;
        $this->dadosCliente($nome, $situacao, $descricao);
        $bd->insertCliente($this);
    }

    function atualizarCliente($id, $nome, $situacao, $descricao)
    { 
        global $bd;
        $this->dadosCliente($nome, $situacao, $descricao);
        $bd->updateCliente($id, $this);
    }

    function excluirCliente($id){
        global $bd;
        $bd->deleteCliente($id);
    }
}
