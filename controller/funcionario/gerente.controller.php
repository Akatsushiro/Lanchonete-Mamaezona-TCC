<?php
require_once "../../model/funcionario/funcionario.class.php";

$funcionario = new funcionario();

$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$acesso = $_POST['acesso'];

$funcionario->salvarFuncionario($nome, $login, $senha, $acesso);