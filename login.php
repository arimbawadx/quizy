<?php 


if (isset($_POST['login'])) {
	

	$username=strtolower($_POST['username']);
	$password=$_POST['password'];

	include('koneksi.php');
	$query="SELECT *FROM biodata WHERE username='$username'";
	$data=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($data);
	$num=mysqli_num_rows($data);
	$hash=$row['password'];


		if ($num==1) {

			if (password_verify($password, $hash )) {
				session_start();
				$_SESSION['username']=$row['username'];
				header('location:biodata.php');
				exit;
			}else{
				echo "<script>
				alert('Password salah!');
				</script>";
			}

		}else {
			echo "<script>
				alert('Username salah!');
				</script>";
		}
}



 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Masuk</title>
	<link rel="stylesheet" type="text/css" href="style_login.css">
</head>
<body>

	<div class="body_login">

		<div class="judul"><h1>Silahkan Login</h1></div>
		<form name="form_login" method="post" action=""> 
			<label for="username">Username</label>
			<input required type="text" id="username" name="username" placeholder="Masukan username" autocomplete="off">
			<br>
			<label for="password">Password</label>
			<input required type="password" id="password" name="password" placeholder="Masukan password">
			<br>
			<input class="button" type="submit" name="login" value="Sign">
		</form>
		<p>Belum punya akun? <a class="link" href="register.php">Daftar!</a></p>
	</div>
	

</body>
</html>