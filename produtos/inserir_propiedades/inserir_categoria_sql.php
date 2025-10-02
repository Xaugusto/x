<?php
include('../../conexao.php');
$nome = $_POST['nome'];
$sql = "INSERT INTO categoria (nome_cat) VALUES ('$nome')";
$executar = mysqli_query($conexao, $sql);
$fechar = mysqli_close($conexao);
header('Location: inserir_categoria.php');

?>