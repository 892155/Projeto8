<!-- Página da interface de login que funciona em conjunto com login.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Entrar</title>    
    <link rel="stylesheet" type="text/css" href="style_form.css">
</head>
<body>
    <!-- Criação do form usando o metodo post para enviar dados para login.php-->
    <form action="login.php" method="post">
        <h2>Entrar</h2>
        <!-- Função para erro de login -->
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <!-- Caixa de usuario -->
        <label>Usuário</label>
        <input type="text" name="uname" placeholder ="Nome de Usuário">

       <!-- Caixa de senha -->
        <label>Senha</label>
        <input type="password" name="password" placeholder ="Senha">

        <!-- Botão de login -->
        <button>Login</button>
        <!-- Botão para criar nova conta -->
        <a href="signup.php" class="ca">Criar uma conta</a>

    </form>
    
</body>
</html>