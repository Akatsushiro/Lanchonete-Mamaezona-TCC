<?php
require_once '../../model/produto/produto.class.php';
require_once '../../model/itens_entrada/entrada.class.php';

$produto = new Produto();

$nome            = addslashes(trim($_POST[0]['add-nome-estoque']));
$marca           = addslashes(trim($_POST[0]['add-marca-estoque']));
$preco           = addslashes(trim($_POST[0]['add-preco-estoque']));
$custo           = addslashes(trim($_POST[0]['add-custo-estoque']));
$quantia         = addslashes(trim($_POST[0]['add-quantidade-estoque']));
$quantia_minima  = addslashes(trim($_POST[0]['add-quantidade-minima-estoque']));
$tipo            = addslashes(trim($_POST[0]['add-tipo-estoque']));

$imgDir = '../../img/produto/';

if(empty($_POST[1])){
    $imagem = '../../img/produto/default.png';
} else {
    $imagem = $imgDir . md5($_POST[0]['add-nome-estoque']) . '.jpg';
}
// Descomente para pegar uma imagem e move-la para uma pasta
/*
$imagem = $_FILES["imagem"]["name"];
$separa = explode(".", $imagem);
$separa = array_reverse($separa);
$extensao = $separa[0];
$imagemF = strtolower(str_replace(' ', '', $nome)) . "." . $extensao;
*/
//if (move_uploaded_file($_FILES['imagem']['tmp_name'], $imgDir . $imagemF)) {
    $id = $produto->verificarProduto($nome);
    if(isset($_POST[0]['add-mais-unid-estoque'])){
        $entrada = new Entrada();
        $unidades = addslashes(trim($_POST[0]['add-mais-unid-estoque']));
        $entrada->salvarEntrada($id, $unidades);
        $produto->adicionarEstoque($unidades, $id);
    } else if($id == false || $id == -1){
        $produto->cadastroProduto($nome, $marca, $imagem, $preco, $custo, $quantia, $quantia_minima, $tipo);
    }
//}
