<?php
require_once "cliente.PDO.php";
$bd = new table_cliente();

interface iCliente{
    public function getNome();
    public function getSituacao();
    public function getDescricao();

    public function setNome($n);
    public function setSituacao($s);
    public function setDescricao($d);

    public function cadastroCliente($nome, $situacao, $descricao);
    public function atualizarCliente($id, $nome, $situacao, $descricao);
    public function excluirCliente($id);
}

final class Cliente implements iCliente
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
    private function dadosCliente($nome, $situacao, $descricao)
    {
        $this->setNome($nome);
        $this->setSituacao($situacao);
        $this->setDescricao($descricao);
    }

    final function cadastroCliente($nome, $situacao, $descricao)
    {
        global $bd;
        $this->dadosCliente($nome, $situacao, $descricao);
        $bd->insertCliente($this);
    }

    final function atualizarCliente($id, $nome, $situacao, $descricao)
    { 
        global $bd;
        $this->dadosCliente($nome, $situacao, $descricao);
        $bd->updateCliente($id, $this);
    }

    final function excluirCliente($id){
        global $bd;
        $bd->deleteCliente($id);
    }
}
