<?php
require_once "..\..\model\produto\produto.class.php";

$produto = new Produto();

$id = addslashes(trim($_GET['id']));

$nome  = addslashes(trim($_POST['nome']));

$marca = addslashes(trim($_POST['marca']));
$preco = addslashes(trim($_POST['preco']));
$custo = addslashes(trim($_POST['custo']));
$tipo  = addslashes(trim($_POST['tipo']));

$produto->alterarProduto($id, $nome, $tipo, $marca, $preco, $custo);

header("Location: ../../view/produto/produtos.Main.php");
