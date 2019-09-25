<?php
require_once "../../model/cliente/cliente.class.php";

$cliente = new Cliente();
// Define a operação a ser feita
if ($_GET['op'] == "delete") {
    // Deletar Cliente
    $id = $_GET['id'];
    $cliente->excluirCliente($id);
} else {
    $nome      = addslashes($_POST['nome']);
    $situacao  = addslashes($_POST['situacao']);
    $descricao = addslashes($_POST['descricao']);
    if ($_GET['op'] == "update") {
        // Atualizar Cliente
        $id = $_GET['id'];
        $cliente->atualizarCliente($id, $nome, $situacao, $descricao);
    } elseif ($_GET['op'] == "insert") {
        // Cadastrar Cliente
        $cliente->cadastroCliente($nome, $situacao, $descricao);
    }
}
header("location: ../../view/cliente/cliente.Main.php");
