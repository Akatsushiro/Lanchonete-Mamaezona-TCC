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
    ?>
    <center>
        <h1>Cadastrar</h1>
        <!-- formulario de cadastrar cliente  -->
        <form action="../../controller/produto/produto.Salvar.php?" method="post" enctype="multipart/form-data" class="my-2">
            Nome: <input type="text" name="nome" id="">
            <br>
            <br>
            Marca: <Textarea name="marca">Descrição</Textarea>
            <br>
            <br>
            Imagem: <input type="file" name="imagem" id="">
            <br>
            <br>
            Preço: <input type="number" name="preco" id="" step="any" min="0" max="9999">
            <br>
            <br>
            Custo: <input type="number" name="custo" id="" step="any" min="0" max="9999">
            <br>
            <br>
            Quantia: <input type="number" name="quantia" id="">
            <br>
            <br>
            Quantia Minima: <input type="number" name="quantia_minima" id="">
            <br>
            <br>
            Tipo: <input type="text" name="tipo" id="">
            <br>
            <br>
            <input type="submit" value="Enviar">
        </form>
        <?php 
        $produto = new Table_Produto();
        $produto->listarProduto();
        $dados = $produto->listarProdutosArray();
        echo $dados;
        ?>
    </center>
</body>

</html>