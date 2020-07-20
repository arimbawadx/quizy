<?php 
session_start();

	if (!isset($_SESSION['username'])) {
		
		header('location:login.php');
	}

	$username=$_SESSION['username'];

	include('koneksi.php');

	

	$query2="DELETE FROM grade WHERE username='$username'";
	mysqli_query($conn,$query2);


	if (mysqli_affected_rows($conn)>0) {
		$query="DELETE FROM biodata WHERE username='$username'";
		mysqli_query($conn,$query);
		echo "<script>
				alert('Akun Terhapus!');
				document.location.href='login.php';
				</script>";
		// header('location:login.php');
	}else{

		echo "<script>
				alert('Akun Gagal dihapus!');
				document.location.href='login.php';
				</script>";
		
		// header('location:biodata.php');

	}

 ?>