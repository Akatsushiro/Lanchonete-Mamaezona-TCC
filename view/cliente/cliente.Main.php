<?php
require_once "../../model/funcionario/funcionario.class.php";
Funcionario::log_teste();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\css\bootstrap.css">
    <title>Cadastro Cliente</title>
</head>

<body>
    <center>
        <h1>Cadastrar</h1>
        <!-- formulario de cadastrar cliente  -->
        <form action="../../controller/cliente/cliente.Salvar.php" method="post" enctype="multipart/form-data" class="my-2">
            Nome: <input type="text" name="nome" id="">
            <br>
            <br>
            Situacao: <input type="text" name="situacao" id="">
            <br>
            <br>
            Descrição: <Textarea name="descricao"></Textarea>
            <br>
            <br>
            Cliente:
            <br>
            Comum <input type="radio" name="tipo" value="C" id="" checked> |
            Mensal <input type="radio" name="tipo" value="M" id="">
            <br>
            <br>
            <input type="submit" value="Enviar">
        </form>
        <?php
        require_once "../../model/cliente/cliente.PDO.php";
        // listar clientes existentes
        $listar = new Table_Cliente();
        $dados = "{ \"data\": " . json_encode($listar->listarClientesArray()). "}";
        $list = $listar->listarClientes();
        echo "$dados";
        ?>
        <pre>
        </pre>
    </center>
</body>

</html>
