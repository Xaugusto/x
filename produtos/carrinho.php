<?php
include('sessao.php');
include('../conexao.php');
//include('topo.php');
$id_cli = $_SESSION['idcli'];
$con = $conexao;
$sql = "select * from carrinho, produtos where carrinho.id_cli = $id_cli and carrinho.id_prod=produtos.id";
$exe = mysqli_query($con, $sql);
$total = 0;
while($res = mysqli_fetch_array($exe)){
	$id_car = $res['id'];
	$nome = $res['nome'];
	$valor = $res['preco'];
	$total += $valor;
	echo "<div>Produto: $nome Preço: $valor <a href='del_carrinho.php?id=$id_car'>Remover</a></div>";
}
echo"<div>O valor total é:<b> $total</b></div>";
echo "<div>&nbsp;</div><div><a href='ver_produtos.php'>Comprar mais</a></div>";
$fecha = mysqli_close($con);
//include('final.html');
?>