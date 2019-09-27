<?php
require_once "..\..\model\produto\produto.class.php";

$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$marca = $_POST['marca'];
$preco = $_POST['preco'];
$custo = $_POST['custo'];

$prod = new Produto();

$prod-> cadastroProduto($nome, $tipo, $marca, $preco, $custo);
