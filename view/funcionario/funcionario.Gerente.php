<?php
require_once "../../model/funcionario/funcionario.class.php";
$vf = new Funcionario();
$vf->log_teste();
?>
<!DOCTYPE html>
<html lang="en">

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
        <form action="../../controller/funcionario/gerente.controller.php" enctype="multipart/form-data" method="post">
            Nome: <input type="text" name="nome" id="" required>
            <br>
            <br>
            Login: <input type="text" name="login" id="" required>
            <br>
            <br>
            Senha: <input type="password" name="senha" id="" required>
            <br>
            <br>
            Tipo:
            <br>
            <br>
            COMUM <input type="radio" name="acesso" value='CM' id="" checked> |
            ADMINISTRADOR <input type="radio" name="acesso" value="US" id="">
            <br>
            <br>
            <input type="submit" class='btn-primary' value="Contratar">
        </form>
    </center>
</body>

</html>