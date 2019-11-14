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
    <title>Gerente</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
    <center>
        <h1>Pagina do Administrador</h1>
        <form action="../../controller/funcionario/funcionario.Salvar.php" enctype="multipart/form-data" method="post">
            Nome: <input type="text" name="nome" id="" required>
            <br>
            <br>
            Login: <input type="text" name="login" id="" required>
            <br>
            <br>
            Email: <input type="text" name="email" id="">
            <br>
            <br>
            Senha: <input type="password" name="senha" id="" required>
            <br>
            <br>
            Tipo:
            <br>
            COMUM <input type="radio" name="acesso" value='CM' id="" checked> |
            ADMINISTRADOR <input type="radio" name="acesso" value="US" id="">
            <br>
            <br>
            <input type="submit" class='btn-primary' value="Contratar">
        </form>
        <a href="../../view/cliente/cliente.Main.php">Clientes</a>
        <br>
        <br>
        <a href="../../view/cliente/produtos.Main.php">Produtos</a>
    </center>
</body>

</html>
