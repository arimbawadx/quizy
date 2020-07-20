<?php 
session_start();

	if (!isset($_SESSION['username_admin'])) {
		
		header('location:login_admin.php');
	}
	
	include('koneksi.php');

	 $nama_soal=$_GET['nm'];
	 
	 $query="DELETE FROM soal WHERE nama_soal='$nama_soal'";
	 mysqli_query($conn,$query);
	 

	 if (mysqli_affected_rows($conn)>0) {
	 	echo "<script>
				alert('Quiz dihapus!');
				document.location.href='quiz_admin.php';
				</script>";
	 	
	 }else{
	 	echo "<script>
				alert('Quiz Gagal dihapus!');
				document.location.href='quiz_admin.php';
				</script>";
	 }
 ?>