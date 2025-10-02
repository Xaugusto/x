<?php
    include('../conexao.php');
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sql = "INSERT INTO clientes (nome, email, senha) VALUES 
    ('$nome', '$email', '$senha')";
    $executar = mysqli_query($conexao, $sql);
    if($executar == 1){
        echo"Sucesso!";
    }
    else{
        echo"Deu pobrema ai";
    }
    $fechar = mysqli_close($conexao);
?> 
