<?php

include "conectar.php";

$id = $_GET['id'];
$nome = $_POST['nome_cliente'];
$situacao = $_POST['situacao'];
$descricao = $_POST['descricao'];

// mostra um alert em javascript para que se saiba se a atualização foi completada com sucesso

if (mysqli_query($sql, "UPDATE `cliente` SET `nome_cliente`='$nome',`situacao`='$situacao',`descricao_cliente`='$descricao' WHERE id_cliente = $id")) {
    echo "<script> alert('Atualizado com sucesso')</script>";
} else {
    echo "<script> alert('Erro ao atulizar')</script>";
}
