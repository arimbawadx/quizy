<?php 
session_start();
if (!isset($_SESSION['username'])) {
		
		header('location:login.php');
	}
include ('koneksi.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Pilih Quiz</title>
	<link rel="stylesheet" type="text/css" href="style_quiz.css">
</head>
<body>
	<header align="center" >
		<table align="center" class="header">
			<tr>
				<td><a class="header" href="biodata.php">BIODATA</a></td>
				<td><a class="aktif" class="header" href="quiz.php">QUIZ</a></td>
				<td><a class="header" href="grade.php">GRADE</a></td>
			</tr>
		</table>
	</header>

	<div class="body">
			<div class="judul"><h1>PILIH QUIZ</h1></div>
			<?php 

				$query="SELECT * FROM soal GROUP BY nama_soal";
				$data=mysqli_query($conn, $query);
				while ($row=mysqli_fetch_array($data)) {


			 ?>
		<div class="list_soal"><a href="soal.php?nama_soal=<?php echo $row['nama_soal']; ?>"><h1><?php echo $row['nama_soal']; ?></h1></a></div>
		<?php 
			}
		 ?>
	</div>



</body>
</html>