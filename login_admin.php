<?php 



if (isset($_POST['login'])) {

	$username_admin="arimbawadx";
	$password_admin="Dekga123";

	$username_input=strtolower($_POST['username_input']);
	$password_input=$_POST['password_input'];


		if ($username_input==$username_admin and $password_input==$password_admin) {
			session_start();
			$_SESSION['username_admin']='arimbawadx';

			header('location:data_user.php');
			
		}else{
				
				echo "<script>
				alert('Anda Bukan Admin!');
				</script>";
			}
}



 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
	<link rel="stylesheet" type="text/css" href="style_login.css">
</head>
<body>

	<div class="body_login">

		<div class="judul"><h1>Login Admin</h1></div>
		<form name="form_login" method="post" action=""> 
			<label for="username">Username</label>
			<input type="text" id="username" name="username_input" placeholder="Masukan username" autocomplete="off">
			<br>
			<label for="password">Password</label>
			<input type="password" id="password" name="password_input" placeholder="Masukan password">
			<br>
			<input class="button" type="submit" name="login" value="Sign">
		</form>
	</div>
	

</body>
</html>