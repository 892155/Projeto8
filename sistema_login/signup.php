<!-- Página de Registro -->

<!DOCTYPE html>
<html>
<head>
	<title>Página de Registro</title>
	<link rel="stylesheet" type="text/css" href="style_form.css">
</head>
<body>
    <!-- Criação do form usando o metodo post para enviar dados para login.php-->
    <form action="signup-check.php" method="post">
     	<h2>Registro</h2>
        <!-- Função para erro de login -->
        <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

        <!-- Caixa de criar nome de usuario -->
        <label>Nome</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Digite seu Nome"><br>
          <?php }?>

          <!-- Caixa de genero -->       
        <div class="from-group mb-3">
               <label for="">Gênero</label>
               <select name="gender" class="form-control">
               <option value=""> -- Selecione seu gênero -- </option>
               <option value="Male">Homem</option>
               <option value="Female">Mulher</option>
               <option value="Other">Outro</option>
               </select>
               </div><br>
          <div class="from-group mb-3">
          <!-- <button type="submit" name="save_select" class="btn btn-primary">Save Selectbox</button> -->
       </div>

        <!-- Caixa de criar ID de usuario -->
        <label>Usuário</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Digite seu nome de usuário"><br>
          <?php }?>


       <!-- Caixa de criar senha -->
       <label>Senha</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Senha"><br>

       <!-- Caixa de confirmar senha -->
       <label>Confirmar senha</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Confirmar senha"><br>

       <!-- Caixa de email -->
       <label>Email</label>
          <input type="email" 
                 name="email" 
                 placeholder="Email"><br>

       
               
               

        <!-- Botão de login -->
        <button type="submit" name="save_select">Cadastrar</button>
          <a href="index.php" class="ca">Já possui uma conta?</a>
     </form>
</body>
</html>