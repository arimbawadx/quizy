<?php
session_start();

	if (!isset($_SESSION['username'])) {
		
		header('location:login.php');
	}

 include('koneksi.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Grade</title>
	<link rel="stylesheet" type="text/css" href="style_data_user.css">
</head>
<body>

	<header align="center" >
		<table align="center" class="header">
			<tr>
				<td><a class="header" href="biodata.php">BIODATA</a></td>
				<td><a class="header" href="quiz.php">QUIZ</a></td>
				<td><a class="aktif" class="header" href="grade.php">GRADE</a></td>
			</tr>
		</table>
	</header>


	<div class="body_data_user">
		<div class="judul"><h1>Grade</h1></div>



		<table align="center" border="3" cellpadding="10" cellspacing="0" >
			<tr>
				<th>SOAL</th>
				<th>NILAI</th>
				<th>AKSI</th>
			</tr>

			<?php 
			$username=$_SESSION['username'];
				$query="SELECT * FROM grade WHERE username='$username'";
				$data=mysqli_query($conn,$query);
				while ($r=mysqli_fetch_array($data)) {
			?>
			<tr>
				<td><?php echo $r['nama_soal']; ?></td>
				<td><?php echo $r['nilai']; ?></td>
				<td><a class="link" href="quiz.php" onclick="return confirm('Anda yakin?')">Coba Lagi</a></td>
			</tr>

			<?php 
				}
			 ?>

			
		</table>

	</div>
</body>
</html>