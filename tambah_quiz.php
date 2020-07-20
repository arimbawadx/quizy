<?php 
session_start();

	if (!isset($_SESSION['username_admin'])) {
		
		header('location:login_admin.php');
	}

include('koneksi.php');




if (isset($_POST['tambah'])) {
	$nama_quiz=$_POST['nama_quiz'];
	$isi_soal=$_POST['isi_soal'];
	$pilA=$_POST['PilA'];
	$pilB=$_POST['PilB'];
	$pilC=$_POST['PilC'];
	$pilD=$_POST['PilD'];
	$jawaban=$_POST['jawaban'];

	$query="INSERT INTO soal VALUES ('', '$nama_quiz','$isi_soal','$pilA','$pilB','$pilC','$pilD','$jawaban')";

	mysqli_query($conn,$query);

	if (mysqli_affected_rows($conn)>0) {
		echo "<script>
			alert('Quiz Berhasil dibuat!');
			document.location.href='quiz_admin.php';
			</script>";
	}else{
		echo "<script>
			alert('Quiz gagal dibuat!');
			document.location.href='quiz_admin.php';
			</script>";
	}
}



 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Quiz</title>
	<link rel="stylesheet" type="text/css" href="style_edit.css">
</head>
<body>
	<div class="body">
			<div class="judul"><h1>Tambah Quiz</h1></div>
		<br>
		<form method="post" action=""> 
			<div align="left">
					<label for="nama_quiz">Nama Quiz</label>
					<br>
					<input type="text" id="nama_quiz" autocomplete="off" name="nama_quiz" placeholder="Masukan Nama Quiz">

					<label for="isi_soal">Isi Soal</label>
					<br>
					<input type="text" id="isi_soal" autocomplete="off" name="isi_soal">

					<label for="pilA">Pilihan A</label>
					<br>
					<input type="text" id="pilA" autocomplete="off" name="PilA">

					<label for="pilB">Pilihan B</label>
					<br>
					<input type="text" id="pilB" autocomplete="off" name="PilB">

					<label for="pilC">Pilihan C</label>
					<br>
					<input type="text" id="pilC" autocomplete="off" name="PilC">

					<label for="pilD">Pilihan D</label>
					<br>
					<input type="text" id="pilD" autocomplete="off" name="PilD">

					<label for="jawaban">Jawaban</label>
					<br>
					<input type="text" id="jawaban" autocomplete="off" name="jawaban">
			</div>

			<div align="center"><input class="button" type="submit" name="tambah" value="Tambah"></div>
		</form>
		<br>
	</div>

</body>
</html>