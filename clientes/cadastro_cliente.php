<?php
include('../conexao.php');
$con = $conexao;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Minha Loja Online</title>
    <link rel="stylesheet" href="cadastro.css">
    <link rel="stylesheet" href="cadastro.js">
</head>
<body>
    <header>
        <h1>Cadastro</h1>
    </header>

    <section class="cadastro">
        <h2>Crie sua conta</h2>
        <form action="cadastro_sql.php" method="post">
        Nome:<input type="text" name="nome" required/><br>
        Email:<input type="text" name="email" required/><br>
        Senha:<input type="password" name="senha" required/><br>
        Tipo de Usuário <select name="user">
            <?php
            $sql = "select * from usuario order by tipo asc";
            $exe = mysqli_query($con, $sql);
            while($res = mysqli_fetch_array($exe)){
                $id = $res['id'];
                $nome = $res['tipo'];
                echo "<option value='$id'>$nome</option>";
            }
            $fechar = mysqli_close($con);
            ?>
        </select>
        <input type="submit">
    </form>
    </section>

    <footer>
        <p>&copy; 2024 Minha Loja Online. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
