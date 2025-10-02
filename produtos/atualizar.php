<?php
include('../conexao.php');
$id = $_POST['id'];
$nome = $_POST['nome'];
$quant = $_POST['quant'];
$preco = $_POST['preco'];
$des = $_POST['des'];
$cat = $_POST['cat'];
$con = $_POST['con'];
$uploaddir = 'imagens/';
$nomeArq = basename($_FILES['arquivo']['name']);
$uploadfile = $uploaddir.$nomeArq;
$sql = "update produtos set nome_prod='$nome', quant=$quant,
preco=$preco, descricao='$des', categoria='$cat', console='$con', foto_prod='$nomeArq' where id_prod=$id";
$executar = mysqli_query($conexao, $sql);
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
	if($executar){
		header('location:consulta.php');
	}
	else{
		echo "erro ao atualizar<br>$sql";
	}
} else {
        header('Location: erro_image.html');
}
$fechar = mysqli_close($conexao);


?>