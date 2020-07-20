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
	<link rel="stylesheet" type="text/css" href="style_biodata.css">
</head>
<body>

<header align="center" >
	<table align="center" class="header">
		<tr>
			<td><a class="aktif" class="header" href="biodata.php">BIODATA</a></td>
			<td><a class="header" href="quiz.php">QUIZ</a></td>
			<td><a class="header" href="grade.php">GRADE</a></td>
		</tr>
	</table>
</header>

<main>
<div class="body_profil">
	<br><br>
	<a href="masukan_profil.php"><img class="imgcircle" src="profil/<?php echo $rows['profil']; ?>" width="250" style=" " /></a>
 
	<h1 style="color: white"><?php echo $rows['nama_lengkap']; ?></h1> 
	
	<br><br>
</div>

<!-- Awal Biodata -->
<div class="biodata">
	<h1>BIODATA</h1>
	<hr size="3" color="black" width="200" />
	<table class="isi" align="center" cellpadding="20" cellspacing="0">
		<tr>
			<td>Nama Lengkap</td>
			<td>:</td>
			<td class="tulis-jalan"><?php echo $rows['nama_lengkap']; ?></td>
			<td><a href="edit.php?nd=Nama Lengkap&f=nama_lengkap&vd=<?php echo $rows['nama_lengkap']; ?>">edit</a></td>
		</tr>
		<tr>
			<td>Nama Panggilan</td>
			<td>:</td>
			<td class="tulis-jalan"><?php echo $rows['nama_panggilan']; ?></td>
			<td><a href="edit.php?nd=Nama Panggilan&f=nama_panggilan&vd=<?php echo $rows['nama_panggilan']; ?>">edit</a></td>
		</tr>
		<tr>
			<td>Tempat/Tanggal Lahir</td>
			<td>:</td>
			<td class="tulis-jalan"><?php echo $rows['tempat_lahir'],', ',$rows['tanggal_lahir']; ?></td>
			<td><a href="edit_ttl.php?nd=Tempat/Tanggal Lahir&vd=<?php echo $rows['tempat_lahir'],', ',$rows['tanggal_lahir']; ?>">edit</a></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td class="tulis-jalan"><?php echo $rows['jenis_kelamin']; ?></td>
			<td><a href="edit_jenis_kelamin.php?nd=Jenis Kelamin&vd=<?php echo $rows['jenis_kelamin']; ?>">edit</a></td>
		</tr>
		<tr>
			<td>Status</td>
			<td>:</td>
			<td class="tulis-jalan"><?php echo $rows['status']; ?></td>
			<td><a href="edit_status.php?nd=Status&vd=<?php echo $rows['status']; ?>">edit</a></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td class="tulis-jalan"><?php echo 'Desa ', $rows['alamat_desa'],', ',$rows['alamat_kabupaten'],', ',$rows['alamat_provinsi']; ?></td>
			<td><a href="edit_alamat.php?nd=Alamat&vd=<?php echo 'Desa ', $rows['alamat_desa'],', ',$rows['alamat_kabupaten'],', ',$rows['alamat_provinsi']; ?>">edit</a></td>
		</tr>
		<tr>
			<td>Hobi</td>
			<td>:</td>
			<td class="tulis-jalan"><?php echo $rows['hobi']; ?></td>
			<td><a href="edit.php?nd=Hobi&f=hobi&vd=<?php echo $rows['hobi']; ?>">edit</a></td>
		</tr>
		<tr>
			<td>Sekolah</td>
			<td>:</td>
			<td class="tulis-jalan"><?php echo 'Di ', $rows['sekolah']; ?></td>
			<td><a href="edit.php?nd=Sekolah&f=sekolah&vd=<?php echo $rows['sekolah']; ?>">edit</a></td>
		</tr>
		<tr>
			<td>Bekerja</td>
			<td>:</td>
			<td class="tulis-jalan"><?php echo 'Di ', $rows['bekerja']; ?></td>
			<td><a href="edit.php?nd=Tempat Kerja&f=bekerja&vd=<?php echo $rows['bekerja']; ?>">edit</a></td>
		</tr>
	</table>

</div>
<!-- Akhir Biodata -->

<div align="center">
<a class="link" href="hapus_akun.php" onclick="return confirm('Anda yakin?')" >Hapus Akun</a>

<a class="link" href="logout.php">Logout</a>
</div>

</main>


<footer>
	<p>Copyright By Yoga Arimbawa</p>
</footer>

</body>
</html>

<?php
	}

 ?>



