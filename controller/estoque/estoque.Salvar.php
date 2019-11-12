<?php
require_once "../../model/estoque/estoque.class.php";


$estoque = new Estoque();

$nome_produto   = $_POST['nome_produto'];
$marca          = $_POST['marca'];
$preco          = $_POST['preco'];
$quantia        = $_POST['quantia'];
$quantia_minima = $_POST['quantia_minima'];

$estoque->cadastroEstoque($nome_produto, $marca, $preco, $quantia, $quantia_minima);