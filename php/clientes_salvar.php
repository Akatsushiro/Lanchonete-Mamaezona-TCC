<?php

include "conectar.php";

$nome = $_POST['nome_cliente'];
$situacao = $_POST['situacao'];
$descricao = $_POST['descricao'];

// Pequeno ajuste tecnico
$dados = mysqli_query($sql, "SELECT MAX(id_cliente) as id_cliente FROM cliente");
while ($coluna = mysqli_fetch_array($dados)) {
    $last_id = $coluna['id_cliente'] + 1;
}
// mostra um alert em Javascript para que se saiba se o cliente foi salvo com sucesso ou não
mysqli_query($sql, "INSERT INTO `cliente`(
    `id_cliente`,
    `nome_cliente`,
    `situacao`,
    `descricao_cliente`
)
VALUES(
    '$last_id',
    '$nome',
    '$situacao',
    '$descricao'
)");

header("location: ../html/clientes.php");