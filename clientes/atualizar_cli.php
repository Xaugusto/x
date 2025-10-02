<?php
icinclude('../conexao.php');
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$user = $_POST['user'];
$sql = "update clientes set nome_cli='$nome', email='$email',
senha='$senha', user_type=$user where id_cli=$id";
$executar = mysqli_query($conexao, $sql);
if($executar){
    echo "Atualizado com sucesso!";
    header('Location: consulta.php');
}
else{
    echo "Erro 
    $sql";
}
$fechar = mysqli_close($conexao);

?>