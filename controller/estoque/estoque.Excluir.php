<?php
require_once "../../model/estoque/estoque.class.php";
$estoque = new Estoque();
$id = $_GET['id'];
$estoque->excluirEstoque($id);