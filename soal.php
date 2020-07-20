<?php
session_start();
if (!isset($_SESSION['username'])) {
		
		header('location:login.php');
	}
	


include('koneksi.php');
$nama_soal=$_GET['nama_soal'];
$_SESSION['quiz']="$nama_soal";

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

		
	<form action="proses_selesai_quiz.php" method="post">
		<table align="center">
			<?php 

		while ($row=mysqli_fetch_array($data)) {
		 ?>
			<!-- Soal -->
			<tr>
				<td><?php echo $i=$i+1,'.'; ?></td>
				<td><?php echo $row['isi_soal'],'...'; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>A<input required type="radio" value="<?php echo $row['a']; ?>" name="pilihan<?php echo $row['id_soal']; ?>"><?php echo $row['a']; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>B<input required type="radio" value="<?php echo $row['b']; ?>" name="pilihan<?php echo $row['id_soal']; ?>"><?php echo $row['b']; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>C<input required type="radio" value="<?php echo $row['c']; ?>" name="pilihan<?php echo $row['id_soal']; ?>"><?php echo $row['c']; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>D<input required type="radio" value="<?php echo $row['d']; ?>" name="pilihan<?php echo $row['id_soal']; ?>"><?php echo $row['d'], '<br><br>'; ?></td>
			</tr>
			<!-- Soal akhir -->

			<?php 

				} 
			?>

		</table>
		<div align="center"><input class="button" type="submit" name="selesai" value="SELESAI"></div>
		
	</form>
		


	</main>

</body>
</html>

