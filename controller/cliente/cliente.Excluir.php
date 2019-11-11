<?php
    require_once "../../model/cliente/cliente.class.php";
    $cliente = new Cliente();

    $id = addslashes(trim($_GET['id']));
    
    $cliente->excluirCliente($id);

    header("location: ../../view/cliente/cliente.Main.php");