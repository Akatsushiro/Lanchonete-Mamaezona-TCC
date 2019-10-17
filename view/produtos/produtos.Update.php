<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\css\bootstrap.css">
    <title>Produtos</title>
</head>

<body>
<?php
    require_once "../../model/produto/produto.PDO.php";
    $produto = new Table_Produto();
    $id = addslashes($_GET['id']);
    $dados = $produto->selectProduto($id);
    
    ?>
    <center>
        <h1>Cadastrar</h1>
        <!-- formulario de cadastrar cliente  -->
        <form action="../../controller/produto/produto.controller.php?op=insert" method="post" enctype="multipart/form-data" class="my-2">
            Nome: <input type="text" name="nome" id="" value="<?php echo $dados[0];?>">
            <br>
            <br>
            Tipo: <input type="text" name="tipo" id="" value="<?php echo $dados[1];?>">
            <br>
            <br>
            Marca: <Textarea name="marca"> <?php echo $dados[2];?></Textarea>
            <br>
            <br>
            Preço: <input type="number" name="preco" id="" value="<?php echo $dados[3];?>" step="any" min="0" max="9999.99">
            <br>
            <br>
            Custo: <input type="number" name="custo" id="" step="any" min="0" max="9999.99">
            <br>
            <br>
            input:
            <input type="submit" value="Enviar">
        </form>
    </center>
</body>

</html>