<?php
include('../conexao.php');
$con = $conexao;
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
			background-color: #000;
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
			$sql = "select * from categoria order by nome asc";
			$exe = mysqli_query($con, $sql);
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
			$sql_2 = "select * from console order by nome asc";
			$exe = mysqli_query($con, $sql_2);
			while($res = mysqli_fetch_array($exe)){
				$id_con = $res['id'];
				$nome = $res['nome'];
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
