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
    <center>
        <h1>Cadastrar</h1>
        <!-- formulario de cadastrar cliente  -->
        <form action="../../controller/produto/produto.controller.php?op=insert" method="post" enctype="multipart/form-data" class="my-2">
            Nome: <input type="text" name="nome" id="">
            <br>
            <br>
            Tipo: <input type="text" name="tipo" id="">
            <br>
            <br>
            Marca: <Textarea name="marca">Descrição</Textarea>
            <br>
            <br>
            Preço: <input type="number" name="preco" id="">
            <br>
            <br>
            Quantia Min: <input type="number" name="qtd_min" id="">
            <br>
            <br>
            Quantia: <input type="number" name="qtd" id="">
            <br>
            <br>
            <input type="submit" value="Enviar">
        </form>
    </center>
</body>

</html>