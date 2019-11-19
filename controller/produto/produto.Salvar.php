<?php
require_once '../../model/produto/produto.class.php';
require_once '../../model/itens_entrada/entrada.class.php';

$produto = new Produto();

$nome            = addslashes(trim($_POST[0]['add-nome-produto']));
$marca           = addslashes(trim($_POST[0]['add-marca-produto']));
$preco           = addslashes(trim($_POST[0]['add-preco-produto']));
$custo           = addslashes(trim($_POST[0]['add-custo-produto']));
$quantia         = addslashes(trim($_POST[0]['add-quantidade-produto']));
$quantia_minima  = addslashes(trim($_POST[0]['add-quantidade-minima-produto']));
$tipo            = addslashes(trim($_POST[0]['add-tipo-produto']));

$imgDir = '../../img/produto/';

if(empty($_POST[1]) || !isset($_POST[1])){
    $imagem = '../../img/produto/default.png';
} else {
    $imagem = $imgDir . md5($_POST[0]['add-nome-produto']) . '.jpg';
}


/*
$imagem = $_FILES["imagem"]["name"];
$separa = explode(".", $imagem);
$separa = array_reverse($separa);
$extensao = $separa[0];
$imagemF = strtolower(str_replace(' ', '', $nome)) . "." . $extensao;
*/
//if (move_uploaded_file($_FILES['imagem']['tmp_name'], $imgDir . $imagemF)) {
    $id = $produto->verificarProduto($nome);
    if(isset($_POST[0]['add-mais-unid-produto'])){
        $entrada = new Entrada();
        $unidades = addslashes(trim($_POST[0]['add-mais-unid-produto']));
        $entrada->salvarEntrada($id, $unidades);
        $produto->adicionarEstoque($unidades, $id);
    } else if($id == false){
        $produto->cadastroProduto($nome, $marca, $imagem, $preco, $custo, $quantia, $quantia_minima, $tipo);
    }
//}
