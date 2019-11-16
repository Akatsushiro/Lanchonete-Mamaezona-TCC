<?php
require_once "..\..\model\produto\produto.class.php";

$produto = new Produto();

$id             = addslashes(trim($_POST['id']));
$imagem         = '';
$nome           = addslashes(trim($_POST['nome']));
$marca          = addslashes(trim($_POST['marca']));
$preco          = addslashes(trim($_POST['preco']));
$custo          = addslashes(trim($_POST['custo']));
$quantia        = addslashes(trim($_POST['quantia']));
$quantia_minima = addslashes(trim($_POST['quantia_minima']));
$tipo           = addslashes(trim($_POST['tipo']));

$produto->alterarProduto($id, $nome, $marca, $imagem, $preco, $custo, $quantia, $quantia_minima, $tipo);

header("Location: ../../view/produto/produtos.Main.php");
