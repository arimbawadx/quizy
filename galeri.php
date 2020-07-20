<?php 
	session_start();

	if (!isset($_SESSION['username'])) {
		
		header('location:login.php');
	}

	include('koneksi.php');

	$username=$_SESSION['username'];
	

	$query="SELECT *FROM biodata WHERE username='$username'";

	$data=mysqli_query($conn, $query);

	while ($rows=mysqli_fetch_array($data)) {
		?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $rows['nama_lengkap']; ?></title>
	<link rel="stylesheet" type="text/css" href="style_galeri.css">
</head>
<body>

<div class="body_profil">
	<br><br>
	<a href="masukan_profil.php"><img class="imgcircle" src="profil/<?php echo $rows['profil']; ?>" width="250" style=" " /></a>
 
	<h1 style="color: white"><?php echo $rows['nama_lengkap']; ?></h1> 
	<a class="link" href="hapus_akun.php" onclick="return confirm('Anda yakin?')"; >Hapus Akun</a>
	<br><br>
</div>

<!-- Awal Biodata -->
<div class="galeri">
	<h1>GALERI</h1>
	<hr size="3" color="black" width="200" />
	<table align="center" cellpadding="20" cellspacing="0">
		<tr align="center">
			<td><img src="profil/noprofil.jpg" width="250px"></td>
			<td><img src="profil/noprofil.jpg"width="250px"></td>
			<td><img src="profil/noprofil.jpg"width="250px"></td>
		</tr>
		<tr align="center">
			<td><img src="profil/noprofil.jpg" width="250px"></td>
			<td><img src="profil/noprofil.jpg"width="250px"></td>
			<td><img src="profil/noprofil.jpg"width="250px"></td>
		</tr>
	</table>
</div>
<!-- Akhir Biodata -->
<br><br><br><br><br><br>

<footer>
	<p>Copyright By Yoga Arimbawa</p>
</footer>

</body>
</html>

<?php
	}
 ?>



