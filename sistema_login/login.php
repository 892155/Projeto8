<!-- php para validar o login usando o POST do index.php-->

<!-- Recebendo e reconhecendo variaveis e validando o login -->
<?php 
session_start(); 
include "db_connect.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=Um nome de usuário é necessário");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Uma senha é necessária");
	    exit();
	}else{
		

        
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
				$_SESSION['gender'] = $row['gender'];
				$_SESSION['email'] = $row['email'];
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: index.php?error=Nome de usuário ou senha incorreta");
		        exit();
			}
		}else{
			header("Location: index.php?error=Nome de usuário ou senha incorreta");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}