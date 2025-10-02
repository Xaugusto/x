<?php
include('sessao.php');
include('conexao.php');
$id = $_GET['id'];
$sql = "DELETE FROM carrinho WHERE id_car=$id";
$executar = mysqli_query($conexao,$sql);
if($executar == 1){
    header('location:carrinho.php?carrinho=2');
}
else{
    echo"$id";
    echo "Erro!";
}
echo "<div><a href='carrinho.php'>Voltar ao carrinho</a></div>";
$fechar = mysqli_close($conexao);
?>
