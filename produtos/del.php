<?php
include('../conexao.php');
$id = $_GET['id'];
$sql = "DELETE FROM produtos WHERE id_prod=$id";
$executar = mysqli_query($conexao,$sql);
if($executar == 1){
    header('Location: consulta.php');
}
else{
    echo "Erro!";
}
$fechar = mysqli_close($conexao);
?>