<?php
require_once "../../model/produto/produto.PDO.php";
require_once '../../model/produto/produto.class.php';
$bd = new Table_Produto();
interface iProduto
{ }

class Produto
{
    private $nome;
    private $marca;
    private $imagem;
    private $preco;
    private $custo;
    private $quantia;
    private $quantia_minima;
    private $tipo;
    private $status;
    // -------------- GETTERS ---------------
    function getNome()
    {
        return $this->nome;
    }

    function getMarca()
    {
        return $this->marca;
    }

    function getimagem()
    {
        return $this->imagem;
    }

    function getPreco()
    {
        return $this->preco;
    }

    function getCusto()
    {
        return $this->custo;
    }

    function getQuantia()
    {
        return $this->quantia;
    }

    function getQuantiaMinima()
    {
        return $this->quantia_minima;
    }

    function getTipo()
    {
        return $this->tipo;
    }

    function getStatus()
    {
        return $this->status;
    }

    // --------- SETTERS ------------
    function setNome($nome)
    {
        $this->nome = stripslashes($nome);
    }

    function setMarca($marca)
    {
        $this->marca = stripslashes($marca);
    }

    function setImagem($img)
    {
        $this->imagem = stripslashes($img);
    }

    function setPreco($preco)
    {
        $this->preco = stripslashes($preco);
    }

    function setCusto($custo)
    {
        $this->custo = stripslashes($custo);
    }

    function setQuantia($q)
    {
        $this->quantia = stripslashes($q);
    }

    function setQuantiaMinima($qm)
    {
        $this->quantia_minima = stripslashes($qm);
    }

    function setTipo($tipo)
    {
        switch ($tipo) {
            case 1:
                $this->tipo = 'Comum';
                break;

            case 2:
                $this->tipo = 'Preparo';
                break;
            case 3:
                $this->tipo = 'Interno';
                break;
        }
    }

    function setStatus($status)
    {
        $this->status = stripslashes($status);
    }
    // -------------- Métodos ---------------- 

    private function dadosProduto($nome, $marca, $imagem, $preco, $custo, $quantia, $quantia_minima, $tipo, $status = 'Ativo')
    {
        $this->setNome($nome);
        $this->setMarca($marca);
        $this->setImagem($imagem);
        $this->setPreco($preco);
        $this->setCusto($custo);
        $this->setQuantia($quantia);
        $this->setQuantiaMinima($quantia_minima);
        $this->setTipo($tipo);
        $this->setStatus($status);
    }

    function cadastroProduto($nome, $marca, $imagem, $preco, $custo, $quantia, $quantia_minima, $tipo)
    {
        $bd = new Table_Produto();
        $this->dadosProduto($nome, $marca, $imagem, $preco, $custo, $quantia, $quantia_minima, $tipo);
        $bd->insertProduto($this);
    }

    function alterarProduto($id, $nome, $marca, $imagem, $preco, $custo, $quantia, $quantia_minima, $tipo)
    {
        $bd = new Table_Produto();
        $this->dadosProduto($nome, $marca, $imagem, $preco, $custo, $quantia, $quantia_minima, $tipo);
        $bd->updateProduto($id, $this);
    }

    function excluirProduto($id)
    {
        $bd = new Table_Produto();
        foreach ($id as $key => $value) {
            $bd->deleteProduto($value);
        }
    }

    function adicionarEstoque($quantia, $id = -1)
    {
        $bd = new Table_Produto();
        if ($id <= 0) { } else {
            $bd->updateEstoque($quantia, $id);
        }
    }

    function retirarEstoque($quantia, $id){
        $bd = new Table_Produto();
        if ($id < 0) { } else {
            $bd->updateEstoque(-1 * $quantia, $id);
        }
    }

    function listarProdutos()
    {
        $bd = new Table_Produto();
        $data['data'] = $bd->listarProdutosArray();
        return json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    function verificarProduto($nome)
    {
        $bd = new Table_Produto();
        return $bd->produtoNome($nome);
    }
}
