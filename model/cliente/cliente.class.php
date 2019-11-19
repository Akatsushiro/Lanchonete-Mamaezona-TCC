<?php
require_once "../../model/security.class.php";
require_once "cliente.PDO.php";
$teste_unitario = new Seguranca();
$bd = new Table_Cliente();

interface iCliente
{
    public function getNome();
    public function getSituacao();
    public function getDescricao();
    public function getTipo();

    public function setNome($n);
    public function setSituacao($s);
    public function setDescricao($d);
    public function setTipo($t);

    public function cadastroCliente($nome, $situacao, $descricao, $tipo);
    public function atualizarCliente($id, $nome, $situacao, $descricao, $tipo, $status);
    public function excluirCliente($id);
}
/**
 * Classe responsável pelos dados do cliente e de aplicar as regras de negócio.
 * 
 * @copyright (c) 2019, Patrick Dantas ETEC Jardim Ângela. 
 */
final class Cliente implements iCliente
{
    private $nome;
    private $situacao;
    private $descricao;
    private $tipo;
    private $status;

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

    function getTipo()
    {
        return $this->tipo;
    }

    function getStatus()
    {
        return $this->status;
    }

    // Setters

    function setNome($n)
    {
        $this->nome = $n;
    }


    function setSituacao($s)
    {
        if ($s == 1) {
            $this->situacao = 'Em dia';
        } else if ($s == 3) {
            $this->situacao = 'Em débito';
        } else if ($s == 2) {
            $this->situacao = 'Em aberto';
        }
    }


    function setDescricao($d)
    {
        $this->descricao = $d;
    }

    function setTipo($t)
    {
        if ($t == 1) {
            $this->tipo = 'Comum';
        } else if ($t == 2) {
            $this->tipo = 'Mensal';
        }
    }

    function setStatus($s)
    {
        if ($s == 1) {
            $this->status = 'Ativo';
        } else if ($s = 2) {
            $this->status = 'Desativo';
        }
    }

    // ----------------------------------------------------------------

    /**
     * Define os dados de um Cliente.
     * 
     * @param string $nome Nome do Cliente.
     * 
     * @param string $situacao Situação do cliente, divida, atraso ou positivo.
     * 
     * @param string $descricao Breve descrição do cliente.
     * 
     * @param string $tipo Se o cliente é 'C' Comum ou 'M' Mensal.
     */
    private function dadosCliente($nome, $situacao, $descricao, $tipo, $status = 1)
    {
        $this->setNome($nome);
        $this->setSituacao($situacao);
        $this->setDescricao($descricao);
        $this->setTipo($tipo);
        $this->setStatus($status);
    }

    /**
     * Faz as verificações de segurança nos dados do cliente e caso todas 
     * passarem na verificação, elas serão salvas no banco.
     * 
     * @param string $nome Nome do Cliente.
     * 
     * @param string $situacao Situação do cliente, divida, atraso ou positivo.
     * 
     * @param string $descricao Breve descrição do cliente.
     * 
     * @param string $tipo Se o cliente é 'C' Comum ou 'M' Mensal.
     */
    final function cadastroCliente($nome, $situacao, $descricao, $tipo)
    {
        global $bd;
        global $teste_unitario;
        $this->dadosCliente($nome, $situacao, $descricao, $tipo);
        if ($teste_unitario->clienteTestes($this)) {
            $bd->insertCliente($this);
        } else {
            header("HTTP/1.0 400 Inválida");
        }
    }

    /**
     * Atualiza os dados do cliente.
     * 
     * @param string $nome Nome do Cliente.
     * 
     * @param string $situacao Situação do cliente, divida, atraso ou positivo.
     * 
     * @param string $descricao Breve descrição do cliente.
     * 
     * @param string $tipo Se o cliente é 'C' Comum ou 'M' Mensal.
     */
    final function atualizarCliente($id, $nome, $situacao, $descricao, $tipo, $status)
    {
        global $bd;
        global $teste_unitario;
        $this->dadosCliente($nome, $situacao, $descricao, $tipo, $status);
        if($teste_unitario->clienteTestes($this)){
            $bd->updateCliente($id, $this);
        } else {
            header("HTTP/1.0 400 Inválida");
        }
    }
    /**
     * Desativa um cliente na base de dados.
     * 
     * @param int $id ID do cliente no banco.
     * 
     * @return void
     */
    final function excluirCliente($id)
    {
        global $bd;
        foreach ($id as $key => $value) {
            $bd->deleteCliente($value);
        }
    }

    function listarClienteJson()
    {
        global $bd;
        $data['data'] = $bd->listarClientesArray();
        return json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    function alterarStatus($op, $id)
    {
        global $bd;
        switch ($op) {
            case 1:
                $bd->ativarCliente($id);
                break;
            case 2:
                $bd->desativarCliente($id);
                break;
        }
    }
}
