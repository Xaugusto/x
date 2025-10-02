<?php
include('../../conexao.php');
$id = $_GET['id'];
$sql = "DELETE FROM console WHERE id_con=$id";
$executar = mysqli_query($conexao,$sql);
if($executar == 1){
    header('Location: inserir_console.php');
}
else{
    echo "Erro!";
}
$fechar = mysqli_close($conexao);
?>