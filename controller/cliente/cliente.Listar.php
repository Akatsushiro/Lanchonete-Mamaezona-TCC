<?php
require_once "../../model/cliente/cliente.class.php";
$cliente = new Cliente();


//if ($funcionario->log_teste()) {
    $data = $cliente->listarClienteJson();
    //echo '<pre>';
    //print_r($data);
    print_r($data);
    //header("location: ../../view/cliente/cliente.Main.php");
//}
