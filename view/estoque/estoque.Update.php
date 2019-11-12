<?php
require_once "../../model/estoque/estoque.PDO.php";
$estoque = new Table_Estoque();
$dados = $estoque->selectEstoque(addslashes(trim($_GET['id'])));
?>
<!DOCTYPE html>
<html lang="pt=BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Document</title>
</head>

<body>
    <center>
        <h1>Alterar Produto em Estoque</h1>
        <br>
        <form action="../../controller/estoque/estoque.Atualizar.php?id=<?php echo addslashes(trim($_GET['id'])) ?>" method="post" enctype="multipart/form-data">
            Nome do produto: <input type="text" value="<?php echo $dados['nome'] ?>" name="nome_produto" id="">
            <br>
            <br>
            Marca: <input type="text" value="<?php echo $dados['marca'] ?>" name="marca" id="">
            <br>
            <br>
            Preco: <input type="number" name="preco" value="<?php echo $dados['preco'] ?>" step="any" id="">
            <br>
            <br>
            Quantia: <input type="number" name="quantia" value="<?php echo $dados['quantia'] ?>" id="">
            <br>
            <br>
            Quantia Minima: <input type="number" name="quantia_minima" value="<?php echo $dados['quantia_min'] ?>" id="">
            <br>
            <br>
            <input type="submit" value="Cadastrar">
    </center>
    </form>
    <br>
</body>

</html>