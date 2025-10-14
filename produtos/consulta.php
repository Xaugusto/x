<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #7A288A;
        color: #fff;
    }

    tr:hover {
        background-color: #f0f0f0;
    }

    a {
        text-decoration: none;
        color: #7A288A;
    }

    a:hover {
        color: #9B30FF;
    }
	.link-principal {
    font-weight: bold;
    font-size: 18px;
    color: #7A288A;
    transition: color 0.3s;
	}

	.link-principal:hover {
	    color: #9B30FF;
	}
	.link-container {
    display: flex;
    justify-content: center;
    margin: 20px 0;
	}
	.link-container {
    display: flex;
    justify-content: center;
    margin: 20px 0;
}

.link-container a {
    margin: 0 20px; /* Adiciona 20px de margem horizontal */
    font-weight: bold;
    font-size: 18px;
    color: #7A288A;
    transition: color 0.3s;
}

.link-container a:hover {
    color: #9B30FF;
}


</style>

<?php
    include('../conexao.php');
    $sql = "SELECT * FROM produtos, categoria, console where produtos.categoria = categoria.id_cat and produtos.console = console.id_con";
    $executar = mysqli_query ($conexao, $sql);
        echo"<table><tr><th>id</th>
        <th>nome</th><th>descricao</th>
        <th>preco</th><th>categoria</th>
        <th>console</th><th>quantidade</th><th>foto do produto</th>
        <th>Ações</th></tr>";
    while($res = mysqli_fetch_array($executar)){
        $id = $res['id_prod'];
        echo "<tr><td>".$res['id_prod']."</td><td>".
        $res['nome_prod']."</td><td>".$res['descricao'].
        "</td><td>".$res['preco']."</td><td>".
        $res['nome_cat']."</td><td>".$res['nome_con'].
        "</td><td>".$res['quant']."</td><td>".
        $res['foto_prod']."</td><td>
        <a href='del.php?id=$id'>Excluir</a> |
        <a href='upd_prod.php?id=$id'>Atualizar</a>
        </td></tr>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="pt-br">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color:   #d3d3d3;
		}

		.container {
			width: 50%;
			margin: 20px auto;
			background-color: #fff;
			padding: 10px;
			border: 1px solid #ddd;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		.container h1 {
			color: #7A288A;
			margin-bottom: 10px;
		}

		form {
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		label {
			margin-bottom: 5px;
			color: #7A288A;
		}

		input, select {
			width: 100%;
			padding: 5px;
			margin-bottom: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}

		input[type="submit"] {
			background-color: #7A288A;
			color: #fff;
			padding: 5px 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #9B30FF;
		}
	</style>
</head>
<body>
	<div class="link-container">
	<a href="inserir_propiedades/inserir_categoria.php" class="link-principal">Adicionar Categorias</a>
    <a href="../index.php" class="link-principal">Página Principal</a>
    <a href="inserir_propiedades/inserir_console.php" class="link-principal">Adicionar Consoles</a>

	</div>
	<div class="container">
		<h1>Cadastrar Produto</h1>
		<form action="inserir_prod.php" method="post" enctype="multipart/form-data" >
			<label>Escolher arquivo:</label>
			<input name="arquivo" type="file"><br>
			<label>Nome do produto:</label>
			<input type="text" name="nome"><br>
			<label>Quantidade:</label>
			<input type="text" name="quant"><br>
			<label>Descricao do Produto:</label>
			<input type="text" name="des"><br>
			<label>Valor:</label>
			<input type="text" name="valor"><br>
			<label>Categoria:</label>
			<select name="cat">
			<?php
			$sql = "select * from categoria order by nome_cat asc";
			$exe = mysqli_query($conexao, $sql);
			while($res = mysqli_fetch_array($exe)){
				$id = $res['id_cat'];
				$nome = $res['nome_cat'];
				echo "<option value='$id'>$nome</option>";
			}
			?>
			</select><br>
			<label>Console:</label>
			<select name="con">
			<?php
			$sql_2 = "select * from console order by nome_con asc";
			$exe = mysqli_query($conexao, $sql_2);
			while($res = mysqli_fetch_array($exe)){
				$id = $res['id_con'];
				$nome = $res['nome_con'];
				echo "<option value='$id'>$nome</option>";
			}
			$fechar = mysqli_close($conexao);
			?>
			</select><br>
			<input type="submit">
		</form>
	</div>
</body>
</html>
