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
	$tempat_lahir=$_POST['tempat_lahir'];
	$tanggal_lahir=$_POST['tanggal_lahir'];
	$bulan_lahir=$_POST['bulan_lahir'];
	$tahun_lahir=$_POST['tahun_lahir'];

	$query="UPDATE biodata SET tempat_lahir='$tempat_lahir', tanggal_lahir='$tahun_lahir-$bulan_lahir-$tanggal_lahir' WHERE username='$username'";

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
				
						<input id="tempat_lahir" type="text" name="tempat_lahir" placeholder="Masukan Tempat Lahir Baru" autocomplete="off">

						<select name="tanggal_lahir">
							<option>Tanggal</option>
							<?php for ($tanggal=01; $tanggal <= 31 ; $tanggal++) { 
								echo "<option>$tanggal</option>";
							} ?>

						</select>

						<select name="bulan_lahir">
							<option>Bulan</option>
							<?php for ($bulan=01; $bulan <= 12 ; $bulan++) { 
								echo "<option>$bulan</option>";
							} ?>

						</select>

						<select name="tahun_lahir">
							<option>Tahun</option>
							<?php 
								$thn=getdate();

							for ($tahun=1889; $tahun <= $thn['year']; $tahun++) { 
								echo "<option>$tahun</option>";
							} ?>

						</select>
			</div>

			<div align="center"><input class="button" type="submit" name="ubah" value="Ubah"></div>
		</form>
		<br>
	</div>

</body>
</html>