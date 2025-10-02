<?php
include('sessao.php');
include('conexao.php');
//include('topo.php');
$id_prod = $_POST['id'];
$id_cli = $_SESSION['idcli'];
$con = $conexao;
$sql = "insert into carrinho (id_cli, id_prod) values ($id_cli, $id_prod)";
$exe = mysqli_query($con, $sql);
if($exe){
	header('Location: pagina_principal.php?login=2');
}
else{
	echo"erro<br>$sql";
}
echo "<a href='ver_produtos.php'>Comprar mais</a>";
$fecha = mysqli_close($con);
//include"final.html";
?>