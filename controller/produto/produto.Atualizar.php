<?php
require_once "..\..\model\produto\produto.class.php";

$produto = new Produto();

$id = addslashes(trim($_POST['alt-id-produto']));

$nome            = addslashes(trim($_POST[0]['add-nome-produto']));
$marca           = addslashes(trim($_POST[0]['add-marca-produto']));
$preco           = addslashes(trim($_POST[0]['add-preco-produto']));
$custo           = addslashes(trim($_POST[0]['add-custo-produto']));
$quantia         = addslashes(trim($_POST[0]['add-quantidade-produto']));
$quantia_minima  = addslashes(trim($_POST[0]['add-quantidade-minima-produto']));
$tipo            = addslashes(trim($_POST[0]['add-tipo-produto']));

$produto->alterarProduto($id, $nome, $marca, $imagem, $preco, $custo, $quantia, $quantia_minima, $tipo);

header("Location: ../../view/produto/produtos.Main.php");
