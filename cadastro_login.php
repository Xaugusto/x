<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Minha Loja Online</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_cadastro.css">
    <script defer src="js/main.js"></script>
    <style>
        /* Estilo geral dos botões */
        .btn-enviar {
            background-color: #7621b2; /* Cor de fundo verde */
            color: white; /* Texto branco */
            border: none; /* Sem borda */
            padding: 10px 20px; /* Espaçamento interno */
            text-align: center; /* Centraliza o texto */
            text-decoration: none; /* Sem sublinhado */
            display: inline-block; /* Para suportar margin */
            font-size: 16px; /* Tamanho da fonte */
            border-radius: 5px; /* Bordas arredondadas */
            cursor: pointer; /* Cursor de mão ao passar o mouse */
            transition: background-color 0.3s; /* Transição suave */
        }

        /* Efeito ao passar o mouse */
        .btn-enviar:hover {
            background-color: #45a049; /* Um tom mais escuro de verde */
        }

        /* Efeito ao passar o mouse nos botões de sobreposição */
        .btn:hover {
            background-color: #007B9E; /* Um tom mais escuro de azul */
        }
        

        /* Estilo do select */
        .select-tipo-usuario {
            width: 100%; /* Largura total */
            padding: 10px; /* Espaçamento interno */
            border: 1px solid #ccc; /* Borda cinza */
            border-radius: 5px; /* Bordas arredondadas */
            font-size: 16px; /* Tamanho da fonte */
            background-color: #f9f9f9; /* Cor de fundo clara */
            cursor: pointer; /* Cursor de mão ao passar o mouse */
            transition: border-color 0.3s; /* Transição suave para a borda */
        }

        /* Efeito ao focar no select */
        .select-tipo-usuario:focus {
            border-color: #4CAF50; /* Borda verde ao focar */
            outline: none; /* Remove contorno padrão */
        }
    </style>
</head>
<body>
<header class="header">
    <h1>Bem-vindo à Minha Loja Online!</h1>
    <nav>
        <a href="contato.html">Contato</a>
        <?php
         $user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
          if($user == 1){
            echo "<a href='pagina_principal.php'>Inicio</a>";
          }
          ?>
    </nav>
</header>

<div class="container right-panel-active">
    <!-- Cadastro -->
    <div class="container__form container--signup">
        <form action="cadastro_sql.php" class="form" id="form1" method="post">
            <h2 class="form__title">Cadastrar</h2>
            <input type="text" placeholder="Usuário" name="nome" class="input" required />
            <input type="text" placeholder="Email" name="email" class="input" required />
            <input type="password" placeholder="Senha" name="senha" class="input" required />
            Tipo de Usuário <select name="user" class="select-tipo-usuario" >
                <?php
                include('conexao.php');
                        $con = $conexao;
                        $sql = "select * from usuario order by tipo asc";
                        $exe = mysqli_query($con, $sql);
                        while($res = mysqli_fetch_array($exe)){
                            $id = $res['id_user'];
                            $nome = $res['tipo'];
                            echo "<option value='$id'>$nome</option>";
                        }
                        $fechar = mysqli_close($con);
                        ?>
            </select><br>
            <button type="submit" class="btn-enviar">Cadastrar</button>
        </form>
    </div>

    <!-- Login -->
    <div class="container__form container--signin">
        <form action="login.php" class="form" id="form2" method="post">
            <h2 class="form__title">Entrar</h2>
            <input type="email" name="login" placeholder="Email" class="input" required />
            <input type="password" name="senha" placeholder="Senha" class="input" required />    
            <button type="submit" class="btn-enviar">Login</button>
        </form>
    </div>

    <!-- Sobreposição -->
    <div class="container__overlay">
        <div class="overlay">
            <div class="overlay__panel overlay--left">
                <button class="btn" id="signIn">Entrar</button>
            </div>
            <div class="overlay__panel overlay--right">
                <button class="btn" id="signUp">Cadastrar</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
