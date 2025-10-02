<?php
include('../conexao.php');
$nome = $_POST['nome'];
$sql = "INSERT INTO usuario (tipo) VALUES ('$nome')";
echo $sql;
$executar = mysqli_query($conexao, $sql);
$fechar = mysqli_close($conexao);

?>