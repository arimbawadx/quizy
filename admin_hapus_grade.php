<?php 
session_start();

	if (!isset($_SESSION['username_admin'])) {
		
		header('location:login_admin.php');
	}
	
	include('koneksi.php');

	 $id_grade=$_GET['id'];
	 
	 $query="DELETE FROM grade WHERE id_grade='$id_grade'";
	 mysqli_query($conn,$query);
	 

	 if (mysqli_affected_rows($conn)>0) {
	 	echo "<script>
				alert('Grade dihapus!');
				document.location.href='data_user.php';
				</script>";
	 	
	 }else{
	 	echo "<script>
				alert('Grade Gagal dihapus!');
				document.location.href='data_user.php';
				</script>";
	 }
 ?>