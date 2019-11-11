<?php
    require_once "../../model/cliente/cliente.class.php";
    $cliente = new Cliente();

    $id        = addslashes(trim($_GET['id']));
    $nome      = addslashes(trim($_POST['nome']));
    $situacao  = addslashes(trim($_POST['situacao']));
    $descricao = addslashes(trim($_POST['descricao']));
    $tipo      = addslashes(trim($_POST['tipo']));
    
    $cliente->atualizarCliente($id, $nome, $situacao, $descricao, $tipo);

    header("location: ../../view/cliente/cliente.Main.php");