<?php
require_once "..\..\model\produto\produto.class.php";

$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$marca = $_POST['marca'];
$preco = $_POST['preco'];
$quantia_min = $_POST['qtd_min'];
$qtd = $_POST['qtd'];

$prod = new Produto();

$prod-> cadastroProduto($nome, $tipo, $marca, $preco, $quantia_min, $qtd);
