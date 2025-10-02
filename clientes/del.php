<?php
include('../conexao.php');
$id = $_GET['id'];
$sql = "DELETE FROM clientes WHERE id_cli=$id";
$executar = mysqli_query($conexao,$sql);
if($executar == 1){
    header('Location: consulta.php');
}
else{
    echo "Erro!";
}
$fechar = mysqli_close($conexao);
?>