<!Doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
		<title>Popina-System</title>
		<!--esse aqui é para chamar o css-->
		<link rel="stylesheet" href="css/css.css" type="text/css">
</head>
<body>
    <section>
        <center>
        <div>
            <form enctype="multipart/form-data" method = "post" action = "../php/salvar_produto.php">
                Nome:<input type="text" name = "produto_nome"> 
                <br>
                <br>
                Tipo:<input type="text" name = "produto_tipo"> 
                <br>
                <br>
                Marca:<input type="text" name = "produto_marca"> 
                <br>
                <br>
                Quantia:<input type="number" name = "quantia"> 
                <br>
                <br>
                Preço:<input type="number" name = "preco"> 
                <br>
                <button>Cadastar</button>
            </form>
        </div>
        </center>
    </section>
</body>
</html>