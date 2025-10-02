<?php
include('conexao.php');
session_start();
$senha = $_POST['senha'];
$login = $_POST['login'];
$sql = "SELECT * FROM clientes WHERE email like '$login'
and senha like '$senha'";
$executar = mysqli_query($conexao, $sql);
$res = mysqli_fetch_array($executar);
if($res['nome_cli'] != NULL){
   $_SESSION['nome'] = $res['nome_cli'];
   $_SESSION['idcli'] = $res['id_cli'];
   $_SESSION['user'] = $res['user_type'];
   
   header("Location: pagina_principal.php?login=1");
}
else{
   echo "Login e/ou senha incorretos";
   header('Location: erro_login.html');
}
$fechar = mysqli_close($conexao);
?>