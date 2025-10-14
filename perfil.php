<?php 
    include('sessao.php');
    $nome = $_SESSION['nome'];
    $id = $_SESSION['idcli'];
    $user = $_SESSION['user'];
    $email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Perfil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d3d3d3;
        }

        .container {
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            color: #7A288A;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            color: #7A288A;
        }

        a:hover {
            color: #9B30FF;
        }

        .link-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .link-container a {
            margin: 0 20px; 
            font-weight: bold;
            font-size: 18px;
            color: #7A288A;
            transition: color 0.3s;
        }

        .link-container a:hover {
            color: #9B30FF;
        }
    </style>
</head>
<body>
    <div class="link-container">
        <a href="index.php" class="link-principal">Página Principal</a>
    </div>
    <div class="container">
        <h1>Página de Perfil</h1>
        <p><strong>Nome:</strong> <?php echo $nome; ?></p>
        <p><strong>Usuário:</strong> <?php echo $user; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
    </div>
</body>
</html>
