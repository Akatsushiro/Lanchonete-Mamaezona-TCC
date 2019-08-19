<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../css/clientes_salvar.css" type="text/css">
    <title>Clientes</title>
</head>

<body>
    <h1>Cadastrar Cliente</h1>
    <form enctype="multipart/form-data" action="../php/clientes_salvar.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome_cliente" id="nome">*
        <br>
        <br>
        <label for="situacao">Situação:</label>
        <select name="situacao" id="situacao" required>
            <option value="p" selected>Positivo</option>
            <option value="n">Negativo</option>
            <option value="a">Atrasado</option>
        </select>*
        <br>
        <br>
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" cols="30" rows="5">s</textarea>
        <br>
        <br>
        <button>Salvar</button>
    </form>
    <center>
        <table class="my-3 table container bg-light">
            <thead class="thead-dark">
                <tr class="cabecario">
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Situação</th>
                    <th> </th>
                </tr>
            </thead>
            <?php
            // listagem dos clientes existentes
            include "../php/conectar.php";
            $dados = $sql->query('SELECT * FROM `cliente`');
            while ($coluna = mysqli_fetch_array($dados)) {
                $id = $coluna['id_cliente'];
                $nome = $coluna['nome_cliente'];
                $situacao = $coluna['situacao'];
                $descricao = $coluna['descricao_cliente'];
                // Ao clicar no nome se redireciona para o formulario de alteração de dados 
                echo "
                    <tr>
                        <td><a href='cliente_alterar.php?id=$id'>$nome</a></td>
                        <td onload='teste()'>$descricao</td>
                        <td id='situacao_cor'>$situacao</td>
                        <td><a href='clientes_excluir.php?id=$id'>Excluir</a></td>
                    </tr>
                ";
            }

            ?>
        </table>
    </center>

    <!-- ignorar por hora -->
    <script>
        function teste() {
            var st = <?php "$situacao"; ?>
            console.log(`${st.value}`)
            var st_b = document.getElementById("situacao_cor")
            if ($situacao.value == "p") {
                st_b.style.background = "red"
            }
        }
    </script>
</body>

</html>