<?php
require_once "..\..\model\produto\produto.class.php";

$produto = new Produto();

$id             = addslashes(trim($_POST[0]['alt-id-produto']));
$nome           = addslashes(trim($_POST[0]['alt-nome-produto']));
$marca          = addslashes(trim($_POST[0]['alt-marca-produto']));
$preco          = addslashes(trim($_POST[0]['alt-preco-produto']));
$custo          = addslashes(trim($_POST[0]['alt-custo-produto']));
$quantia        = addslashes(trim($_POST[0]['alt-quantidade-produto']));
$quantia_minima = addslashes(trim($_POST[0]['alt-quantidade-minima-produto']));
$tipo           = addslashes(trim($_POST[0]['alt-tipo-produto']));

$produto->alterarProduto($id, $nome, $marca, $imagem, $preco, $custo, $quantia, $quantia_minima, $tipo);

//header("Location: ../../view/produto/produtos.Main.php");
