<?php
require_once "..\..\model\produto\produto.class.php";

$produto = new Produto();

$nome            = addslashes(trim($_POST['nome']));
$marca           = addslashes(trim($_POST['marca']));
$preco           = addslashes(trim($_POST['preco']));
$custo           = addslashes(trim($_POST['custo']));
$quantia         = addslashes(trim($_POST['quantia']));
$quantia_minima  = addslashes(trim($_POST['quantia_minima']));
$tipo            = addslashes(trim($_POST['tipo']));

$imgDir = '../../img/produto/';
$imagem = $_FILES["imagem"]["name"];
$separa = explode(".", $imagem);
$separa = array_reverse($separa);
$extensao = $separa[0];
$imagemF = strtolower(str_replace(' ', '', $nome)) . "." . $extensao;

if (move_uploaded_file($_FILES['imagem']['tmp_name'], $imgDir . $imagemF)) {
    $imagem = $imgDir . $imagemF;
    $produto->cadastroProduto($nome, $marca, $imagem, $preco, $custo, $quantia, $quantia_minima, $tipo);
}
