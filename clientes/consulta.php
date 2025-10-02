<?php
include ('sessao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d3d3d3;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #7A288A;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #7A288A;
            color: #fff;
        }

        tr:hover {
            background-color: #f0f0f0;
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
    </style>
</head>
<body>
    <div class="link-container">
        <a href="../pagina_principal.php">Página Principal</a>
    </div>
    <div class="container">
        <h1>Lista de Clientes</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th>Tipo de Usuário</th>
                <th>Ações</th>
            </tr>
            <?php
                include('../conexao.php');
                
                $sql = "SELECT * FROM clientes, usuario WHERE clientes.user_type = usuario.id_user";
                $executar = mysqli_query($conexao, $sql);
                while ($res = mysqli_fetch_array($executar)) {
                    $id = $res['id_cli'];
                    echo "<tr>
                        <td>".$res['id_cli']."</td>
                        <td>".$res['nome_cli']."</td>
                        <td>".$res['email']."</td>
                        <td>".$res['senha']."</td>
                        <td>".$res['tipo']."</td>
                        <td>
                            <a href='del.php?id=$id'>Excluir</a> |
                            <a href='upd_cli.php?id=$id'>Atualizar</a>
                        </td>
                    </tr>";
                }
                mysqli_close($conexao);
            ?>
        </table>
    </div>
</body>
</html>