<?php 
include "conectar.php";

$id = $_GET['id'];

if(mysqli_query($sql, "DELETE FROM `cliente` WHERE id_cliente = $id")){
    echo "<script> alert('Sucesso ao excluir')</script>";
    header("refresh: 0, url=../html/clientes.php");
}else{
    echo "<script> alert('Falha ao tentar excluir')</script>";
}

?>