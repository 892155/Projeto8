<!-- php para validar o cadastro-->

<!-- Recebendo e reconhecendo variaveis e validando o cadastro -->
<?php 
session_start(); 
include "db_connect.php";

if (isset($_POST['uname']) && isset($_POST['password'])
	&& isset($_POST['name']) && isset($_POST['re_password'])
	&& isset($_POST['gender']) && isset($_POST['email']) ) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}



	$gender=$_POST['gender'];
	$email=$_POST['email'];

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);	

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: signup.php?error=ID de usuário é necessário&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Uma senha é necessária&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Confirme sua senha&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: signup.php?error=Informe seu nome&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=A confirmação de senha está errada&$user_data");
	    exit();
	}

	else{

		

	    $sql = "SELECT * FROM users WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=O nome de usuário já está em uso&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(user_name, password, name, gender, email) VALUES('$uname', '$pass', '$name', '$gender', '$email')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Sua conta foi criada com sucesso!");
	         exit();
           }else {
	           	header("Location: signup.php?error=Erro desconhecido&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}