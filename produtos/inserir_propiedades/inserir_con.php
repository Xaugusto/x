<?php
include('../../conexao.php');
$nome = $_POST['nome'];
$sql = "INSERT INTO console (nome_con) VALUES ('$nome')";

$executar = mysqli_query($conexao, $sql);
$fechar = mysqli_close($conexao);
header('Location: inserir_console.php');

?>