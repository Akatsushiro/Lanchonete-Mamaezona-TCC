<?php
    include "conectar.php";

    $nome    = $_POST['produto_nome'];
    $tipo    = $_POST['produto_tipo'];
    $marca   = $_POST['produto_marca'];
    $quantia = $_POST['quantia'];
    $preco   = $_POST['preco'];
 
    $sql ->query("INSERT INTO estoque(nome_produto, tipo_produto, 
    marca_produto, quantia_produto, preco)
    VALUES ('$nome', '$tipo', '$marca', $quantia, $preco)");

    echo "Cadastro realizado com sucesso";
?>