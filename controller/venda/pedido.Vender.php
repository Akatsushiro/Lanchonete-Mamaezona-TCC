<?php

require_once "../../model/pedido/pedido.class.php";
require_once "../../model/itens_vendidos/vendidos.class.php";
$pedido = new Pedido();
$vendidos = new Venda();

$total = $_POST['valorTotalDaCompra'];
$forma_de_pagamento = $_POST['formaDePagamento'];
$produtosLista = $_POST['listaDeCompras'];

print_r($_POST);

if(!isset($_POST['dadosCliente'])){
    $id_pedido = $pedido->novaVenda($total, $forma_de_pagamento);
    echo "<br> ------------ $id_pedido -----------------<br>";
    $vendidos->salvarSaida($id_pedido, $produtosLista);
}

