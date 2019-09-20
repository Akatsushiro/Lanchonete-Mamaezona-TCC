<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Cliente</title>
</head>

<body>
    <center>
        <h1>Cadastrar</h1>
        <!-- formulario de cadastar cliente  -->
        <form action="../../controller/cliente/cliente.controller.php?op=insert" method="post" enctype="multipart/form-data">
            Nome: <input type="text" name="nome" id="">
            <br>
            <br>
            Situacao: <input type="text" name="situacao" id="">
            <br>
            <br>
            Descrição: <Textarea name="descricao">Descrição</Textarea>
            <br>
            <br>
            <input type="submit" value="Enviar">
        </form>
        <?php
        require_once "../../model/cliente/cliente.PDO.php";
        // listar clientes existentes
        $listar = new Table_Cliente();
        $list = $listar->listarClientes();
        ?>
    </center>
</body>

</html>