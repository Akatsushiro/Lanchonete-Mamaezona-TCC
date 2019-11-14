<?php
require_once "../../model/cliente/cliente.class.php";
require_once "../../model/funcionario/funcionario.class.php";
$cliente = new Cliente();
if (!empty($_POST)) {
    if (Funcionario::log_teste()) {
        $nome      = addslashes(trim($_POST['nome']));
        $situacao  = addslashes(trim($_POST['situacao']));
        $descricao = addslashes(trim($_POST['descricao']));
        $tipo      = addslashes(trim($_POST['tipo']));
        $cliente->cadastroCliente($nome, $situacao, $descricao, $tipo);
        header("location: ../../view/cliente/cliente.Main.php");
    } else {
        header("location: ../../view/login.php");
    }
}
