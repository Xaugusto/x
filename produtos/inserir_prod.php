<?php
include('../conexao.php');
$nome = $_POST['nome'];
$quant = $_POST['quant'];
$valor = $_POST['valor'];
$des = $_POST['des'];
$cat = $_POST['cat'];
$con = $_POST['con'];
$uploaddir = 'imagens/';
$nomeArq = basename($_FILES['arquivo']['name']);
$uploadfile = $uploaddir.$nomeArq;
$sql = "insert into produtos (nome_prod, quant, preco, categoria, foto_prod, console, descricao)
 values ('$nome', '$quant', '$valor', '$cat', '$nomeArq', '$con','$des')";
$executar = mysqli_query($conexao, $sql);

if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
	if($executar){
		header('Location: consulta.php');

	}
	else{
		echo "erro ao cadastrar";
	}
} else {
    header('Location: erro_image.html');
}
$fechar = mysqli_close($conexao);

?>