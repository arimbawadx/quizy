<?php 
session_start();

	if (!isset($_SESSION['username_admin'])) {
		
		header('location:login_admin.php');
	}

include('koneksi.php');

$id_soal=$_GET['id'];

$query="DELETE FROM soal WHERE id_soal='$id_soal'";
mysqli_query($conn,$query);

if (mysqli_affected_rows($conn)>0) {
		echo "<script>
			alert('Soal Berhasil dihapus!');
			document.location.href='quiz_admin.php';
			</script>";
	}else{
		echo "<script>
			alert('Soal gagal dihapus!');
			document.location.href='quiz_admin.php';
			</script>";
	}


 ?>