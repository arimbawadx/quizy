<?php 
session_start();

	if (!isset($_SESSION['username_admin'])) {
		
		header('location:login_admin.php');
	}
include ('koneksi.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Quiz</title>
	<link rel="stylesheet" type="text/css" href="style_quiz.css">
</head>
<body>
	<header align="center" >
		<table align="center" class="header">
			<tr>
				<td><a class="header" href="data_user.php">GRADE</a></td>
				<td><a class="aktif" href="quiz_admin.php">QUIZ</a></td>
			</tr>
		</table>
	</header>

	<div class="body">
			<div class="judul"><h1>DAFTAR QUIZ</h1></div>
			<?php 

				$query="SELECT * FROM soal GROUP BY nama_soal";
				$data=mysqli_query($conn, $query);
				while ($row=mysqli_fetch_array($data)) {


			 ?>
		<div class="list_soal">
			<a href="soal_admin.php?nama_soal=<?php echo $row['nama_soal']; ?>"><h1><?php echo $row['nama_soal']; ?></h1></a>
			
			<a class="link" onclick="return confirm('Yakin hapus semua soal <?php echo $row['nama_soal']; ?> ?')" href="admin_hapus_quiz.php?nm=<?php echo $row['nama_soal']; ?>">HAPUS</a>
		</div>
		<?php 
			}
		 ?>
	</div>
	<div align="center">
		<a class="link" href="tambah_quiz.php">TAMBAH QUIZ</a>
	</div>
	<br>



</body>
</html>