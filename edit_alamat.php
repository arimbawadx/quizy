<?php 
session_start();

	if (!isset($_SESSION['username'])) {
		
		header('location:login.php');
	}

$nd=$_GET['nd'];
$vd=$_GET['vd'];

include('koneksi.php');

$username=$_SESSION['username'];

if (isset($_POST['ubah'])) {
	$alamat_desa_baru=$_POST['alamat_desa_baru'];
	$alamat_kabupaten_baru=$_POST['alamat_kabupaten_baru'];
	$alamat_provinsi_baru=$_POST['alamat_provinsi_baru'];

	$query="UPDATE biodata SET alamat_desa='$alamat_desa_baru', alamat_kabupaten='$alamat_kabupaten_baru', alamat_provinsi='$alamat_provinsi_baru' WHERE username='$username'";

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
					<label><?php echo $nd; ?> Baru</label>
					<br>
					<input type="text" name="alamat_desa_baru" placeholder="desa" autocomplete="off">
					<input type="text" name="alamat_kabupaten_baru" placeholder="kabupaten" autocomplete="off">
					<input type="text" name="alamat_provinsi_baru" placeholder="provinsi" autocomplete="off">
			</div>

			<div align="center"><input class="button" type="submit" name="ubah" value="Ubah"></div>
		</form>
		<br>
	</div>

</body>
</html>