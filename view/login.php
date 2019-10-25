<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <center>
        <h1>Logar</h1>
        <form action="../controller/funcionario/login.controller.php" enctype="multipart/form-data" method="post">
            <br>
            Login: <input type="text" name="login" id="">
            <br>
            <br>
            Senha: <input type="password" name="senha" id="">
            <br>
            <br>
            <input type="submit" value="Logar">
        </form>

    </center>
</body>

</html>