<?php
require_once "..\..\model\produto\produto.class.php";

$produto = new Produto();

$nome  = addslashes(trim($_POST['nome']));
$tipo  = addslashes(trim($_POST['tipo']));
$marca = addslashes(trim($_POST['marca']));
$preco = addslashes(trim($_POST['preco']));
$custo = addslashes(trim($_POST['custo']));

$produto->cadastroProduto($nome, $tipo, $marca, $preco, $custo);

header("Location: ../../view/produto/produtos.Main.php");