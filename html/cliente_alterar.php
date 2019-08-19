<?php
include "../php/conectar.php";

// recebe o id do cliente a ser alterado
$id = $_GET['id'];

// atraves do id perquisa os dados do cliente
$dados = mysqli_query($sql, "SELECT * FROM cliente WHERE id_cliente = $id");
while ($coluna = mysqli_fetch_array($dados)) {
    $nome = $coluna['nome_cliente'];
    $situacao = $coluna['situacao'];
    $descricao = $coluna['descricao_cliente'];
}


/* No input dropdown tem 3 valores  sendo p = positivo, n = negativo e a = atrasado, para que o situacao atual
do cliente seja selecionada, usasse o 'selected' do html atraves de uma variavel no php, e o if decide qual 
deles é a situação atraves do valor do banco no momento */
if ($situacao == "n") {
    $positivo = " ";
    $negativo = "selected";
    $atrasado = " ";
} elseif ($situacao == "a") {
    $positivo = " ";
    $negativo = " ";
    $atrasado = "selected";
} else {
    $positivo = "selected";
    $negativo = " ";
    $atrasado = " ";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../css/clientes_salvar.css" type="text/css">
    <title>Atualizar Clientes</title>
</head>

<body>
    <h1>Atualizar Cliente</h1>
    <!-- o id no action é passado para que a alteração possa ser feita no usuario -->
    <form enctype="multipart/form-data" action="../php/cliente_alterar.php?id=<?php echo $id; ?>" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome_cliente" id="nome" value="<?php echo $nome; ?>">*
        <br>
        <br>
        <label for="situacao">Situação:</label>
        <select name="situacao" id="situacao" required>
            <!-- para selecionar a situação atual do cliente -->
            <option value="p" <?php echo $positivo; ?>>Positivo</option>
            <option value="n" <?php echo $negativo; ?>>Negativo</option>
            <option value="a" <?php echo $atrasado; ?>>Atrasado</option>
        </select>*
        <br>
        <br>
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" cols="30" rows="5"><?php echo $descricao; ?></textarea>
        <br>
        <br>
        <button>Salvar Mudanças</button>
    </form>
</body>

</html>