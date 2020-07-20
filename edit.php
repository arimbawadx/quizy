<?php 
session_start();

	if (!isset($_SESSION['username'])) {
		
		header('location:login.php');
	}

include('koneksi.php');

$username=$_SESSION['username'];

$field=$_GET['f'];
$nd=$_GET['nd'];
$vd=$_GET['vd'];



if (isset($_POST['ubah'])) {
	$databaru=$_POST['databaru'];

	$query="UPDATE biodata SET $field='$databaru' WHERE username='$username'";

	mysqli_query($conn,$query);

	if (mysqli_affected_rows($conn)>0) {
		echo "<script>
			alert('Berhasil diubah!');
			document.location.href='biodata.php';
			</script>";
	}else{
		echo "<script>
			alert('Berhasil diubah!');
			document.location.href='biodata.php';
			</script>";
	}
}



 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data</title>
	<link rel="stylesheet" type="text/css" href="style_edit.css">
</head>
<body>
	<div class="body">
			<div class="judul"><h1>Ubah <?php echo $nd; ?></h1></div>
		<br>
		<form method="post" action=""> 
			<div align="left">
					<label for="lama"><?php echo $nd; ?> Sekarang</label>
					<br>
					<input type="text" id="lama" name="datalama" value="<?php echo $vd ?>" readonly="">
					<br>
					<label for="baru"><?php echo $nd; ?> Baru</label>
					<br>
					<input type="text" id="baru" autocomplete="off" name="databaru" placeholder="Masukan <?php echo $nd; ?> yang baru">
			</div>

			<div align="center"><input class="button" type="submit" name="ubah" value="Ubah"></div>
		</form>
		<br>
	</div>

</body>
</html>