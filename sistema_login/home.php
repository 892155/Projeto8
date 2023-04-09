<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Gerenciar conta</title>
	<link rel="stylesheet" type="text/css" href="style_form.css">
</head>
<body>
     <h1>Olá, seja bem vindo(a) <?php echo $_SESSION['name']; ?>!</h1>
     <a href="logout.php">Sair</a>
     <br><br>
     <a href="(coloca aqui o html do site)">Acessar o site</a>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>