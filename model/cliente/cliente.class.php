<?php
require_once "../../model/security.class.php";
require_once "cliente.PDO.php";
$teste_unitario = new Seguranca();
$bd = new table_cliente();

interface iCliente{
    public function getNome();
    public function getSituacao();
    public function getDescricao();
    public function getTipo();

    public function setNome($n);
    public function setSituacao($s);
    public function setDescricao($d);
    public function setTipo($t);

    public function cadastroCliente($nome, $situacao, $descricao,$tipo);
    public function atualizarCliente($id, $nome, $situacao, $descricao,$tipo);
    public function excluirCliente($id);
}

final class Cliente implements iCliente
{
    private $nome;
    private $situacao;
    private $descricao;
    private $tipo;

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

    function getTipo(){
        return $this->tipo;
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

    function setTipo($t){
        $this->tipo = $t;
    }

    // ----------------------------------------------------------------

    // Define os dados de um Cliente
    private function dadosCliente($nome, $situacao, $descricao, $tipo)
    {
        $this->setNome($nome);
        $this->setSituacao($situacao);
        $this->setDescricao($descricao);
        $this->setTipo($tipo);
    }

    final function cadastroCliente($nome, $situacao, $descricao, $tipo)
    {
        global $bd;
        global $teste_unitario;
        $this->dadosCliente($nome, $situacao, $descricao, $tipo);
        if($teste_unitario->clienteTestes($this)){
            $bd->insertCliente($this);
        }
    }

    final function atualizarCliente($id, $nome, $situacao, $descricao, $tipo)
    { 
        global $bd;
        $this->dadosCliente($nome, $situacao, $descricao, $tipo);
        $bd->updateCliente($id, $this);
    }

    final function excluirCliente($id){
        global $bd;
        $bd->deleteCliente($id);
    }
}
