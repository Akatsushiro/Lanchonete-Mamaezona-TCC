<?php
require_once "..\..\model\produto\produto.class.php";

$produto = new Produto();

$id             = addslashes(trim($_POST[0]['alt-id']));
$nome           = addslashes(trim($_POST[0]['alt-nome-estoque']));
$marca          = addslashes(trim($_POST[0]['alt-marca-estoque']));
$preco          = addslashes(trim($_POST[0]['alt-preco-estoque']));
$custo          = addslashes(trim($_POST[0]['alt-custo-estoque']));
$quantia        = addslashes(trim($_POST[0]['alt-quantidade-estoque']));
$quantia_minima = addslashes(trim($_POST[0]['alt-quantidade-minima-estoque']));
$tipo           = addslashes(trim($_POST[0]['alt-tipo-estoque']));
$status         = addslashes(trim($_POST[0]['alt-status-estoque']));

$imgDir = '../../img/produto/';

if(empty($_POST[1])){
    $imagem = '../../img/produto/default.png';
} else {
    $imagem = $imgDir . md5($_POST[0]['alt-nome-estoque']) . '.jpg';
}
print_r($_POST);
$produto->alterarProduto($id, $nome, $marca, $imagem, $preco, $custo, $quantia, $quantia_minima, $tipo, $status);
