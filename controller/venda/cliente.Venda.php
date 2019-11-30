<?php
require_once "../../model/cliente/cliente.class.php";
$cliente = new Cliente();


//if ($funcionario->log_teste()) {
    $data = $cliente->listarClienteVendas();
    print_r($data);
//}