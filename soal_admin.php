<?php
session_start();
if (!isset($_SESSION['username_admin'])) {
		
		header('location:login_admin.php');
	}
	


include('koneksi.php');
$nama_soal=$_GET['nama_soal'];

$query="SELECT * FROM soal WHERE nama_soal='$nama_soal'";


$data=mysqli_query($conn, $query);
$num=mysqli_num_rows($data);
 
$i=0;

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Quiz</title>
	<link rel="stylesheet" type="text/css" href="style_pemrogramanweb.css">
</head>
<body>
	<main>
		<div class="judul">
			<h1><?php echo $nama_soal ?></h1>
		</div>

		
		<table align="center">
			<?php 

		while ($row=mysqli_fetch_array($data)) {
		 ?>
			<!-- Soal -->
			<tr>
				<td><?php echo $i=$i+1,'.'; ?></td>
				<td><?php echo $row['isi_soal'],'...'; ?></td>
				<td><a class="link" href="edit_soal.php?id=<?php echo $row['id_soal']; ?>">edit</a></td>
				<td><a class="link" onclick="return confirm('Yakin hapus soal ini?')" href="hapus_soal.php?id=<?php echo $row['id_soal']; ?>">hapus</a></td>
			</tr>
			<tr>
				<td></td>
				<td>A. <?php echo $row['a'], '<br>'; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>B. <?php echo $row['b'], '<br>'; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>C. <?php echo $row['c'], '<br>'; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>D. <?php echo $row['d'], '<br>'; ?></td>
			</tr>
			<tr>
				<td></td>
				<td><b>Kunci Jawaban : <?php echo $row['jawaban'], '<br>'; ?></b></td>
			</tr>
			<!-- Soal akhir -->

			<?php 

				} 
			?>

		</table>
		<div align="center"><a class="link" href="tambah_soal.php?nm=<?php echo $nama_soal ?>">Tambah Soal</a></div>
		
		


	</main>

</body>
</html>

