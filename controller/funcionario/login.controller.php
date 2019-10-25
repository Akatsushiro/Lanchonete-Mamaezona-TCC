<?php

require_once "../../model/funcionario/funcionario.class.php";

$login = $_POST['login'];
$senha = $_POST['senha'];

$log = new Funcionario();

$log->logar($login, $senha);