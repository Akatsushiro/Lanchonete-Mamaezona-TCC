<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\css\bootstrap.css">
    <title>PDO</title>
</head>

<body>
    <?php
    require_once "../../model/cliente/cliente.PDO.php";
    $cliente = new Table_Cliente();
    $id = addslashes($_GET['id']);
    $dados = $cliente->selectCliente($id);
    ?>
    <center>
        <h1>Alterar</h1>
        <!-- Formulario de atualição de cliente -->
        <form action="../../controller/cliente/cliente.controller.php?op=update&id=<?php echo $id?>" method="post" enctype="multipart/form-data">
            Nome: <input type="text" name="nome" id="" value="<?php echo $dados[0];?>">
            <br>
            <br>
            Situacao: <input type="text" name="situacao" id="" value="<?php echo $dados[1];?>">
            <br>
            <br>
            Descrição: <Textarea name="descricao"><?php echo $dados[2];?></Textarea>
            <br>
            <br>
            <input type="submit" value="Enviar">
        </form>
    </center>
</body>

</html>