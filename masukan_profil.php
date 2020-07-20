<?php 

	session_start();

	if (!isset($_SESSION['username'])) {
		
		header('location:login.php');
	}

if (isset($_POST['simpan_profil'])) {


	$dir="profil/";

	$uploadfile=$dir.$_FILES['profil']['name'];

	if (is_uploaded_file($_FILES["profil"]["tmp_name"])) {
	$kirim=move_uploaded_file($_FILES["profil"]["tmp_name"], $uploadfile);
		if ($kirim) {
			header('location:biodata.php');
		}else{
			echo "<script>
				alert('profil gagal diupdate');
				</script>";
			echo "error : ". $_FILES["gambar"]["error"];
		}
	}

	include('koneksi.php');

	session_start();

	$username=$_SESSION['username'];

	$namafile=$_FILES['profil']['name'];

	$query="UPDATE biodata SET profil='$namafile' WHERE username='$username' ";

	mysqli_query($conn,$query);
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Masukan Profil</title>
	<link rel="stylesheet" type="text/css" href="style_masukan_profil.css">
</head>
<body>

	<div class="body">
			<div class="judul"><h1>Silahkan Masukan Profil</h1></div>
		<br>
			<form action="" method="post" enctype="multipart/form-data">
				<input type="file" name="profil">
				<br>

				<input class="button" type="submit" name="simpan_profil" value="Simpan">
			</form>
		<br>
	</div>

</body>
</html>