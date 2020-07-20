<?php 
session_start();
if (!isset($_SESSION['username'])) {
		
		header('location:login.php');
	}
include ('koneksi.php');
$sesi_quiz=$_SESSION["quiz"];
$query="SELECT * FROM soal WHERE nama_soal='$sesi_quiz'";
	$data=mysqli_query($conn, $query);
	$num=mysqli_num_rows($data);

	$i=0;
	$nilai=0;

	
		while ($rows=mysqli_fetch_array($data)) {
			$jawaban=$rows['jawaban'];
			$pilihan=$_POST['pilihan'.$rows['id_soal']];
	// echo $jawaban."<br>";
	// echo $pilihan."<br>";
			if ($jawaban==$pilihan) {
				$nilai=$nilai+20;
			}
				
		}
	


if (isset($_POST['simpan_nilai'])) {
	$sesi_username=$_SESSION["username"];
	$sesi_quiz=$_SESSION["quiz"];
	$sesi_nilai=$_SESSION["nilai"];
	$query="INSERT INTO grade VALUES ('','$sesi_username','$sesi_quiz','$sesi_nilai')";
	mysqli_query($conn,$query);
	header("location:grade.php");
}

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Result</title>
 	<link rel="stylesheet" type="text/css" href="style_masukan_profil.css">
 </head>
 <body>

 	<div class="body">
			<div class="judul" style="font-family: arial"><h1>NILAI : <?php $_SESSION['nilai']=$nilai; echo $nilai; ?></h1></div>
		<br>
			<form action="" method="post">
				<input class="button" type="submit" name="simpan_nilai" value="SELESAI">
			</form>
		<br>
	</div>

 
 </body>
 </html>