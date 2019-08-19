<?php 

$id = $_POST['id'];

if(mysqli_query($sql, "DELETE FROM `cliente` WHERE id_cliente = $id")){
    echo "<script> alert('Sucesso ao excluir')</script>";
}else{
    echo "<script> alert('Falha ao tentar excluir')</script>";
}

?>