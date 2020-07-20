 <?php 
session_start();

	if (!isset($_SESSION['username_admin'])) {
		
		header('location:login_admin.php');
	}

include('koneksi.php');

$id_soal=$_GET['id'];

$query="SELECT * FROM soal WHERE id_soal='$id_soal'";
$data=mysqli_query($conn,$query);
$row=mysqli_fetch_array($data);





if (isset($_POST['ubah'])) {
	$isi_soal=$_POST['isi_soal'];
	$pilA=$_POST['PilA'];
	$pilB=$_POST['PilB'];
	$pilC=$_POST['PilC'];
	$pilD=$_POST['PilD'];
	$jawaban=$_POST['jawaban'];

	$query2="UPDATE soal SET isi_soal='$isi_soal', a='$pilA', b='$pilB', c='$pilC', d='$pilD', jawaban='$jawaban' WHERE id_soal='$id_soal'";
	

	mysqli_query($conn,$query2);

	if (mysqli_affected_rows($conn)>0) {
		echo "<script>
			alert('Soal Berhasil diubah!');
			document.location.href='quiz_admin.php';
			</script>";
	}else{
		echo "<script>
			alert('Soal gagal diubah!');
			document.location.href='quiz_admin.php';
			</script>";
	}
}



 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Soal</title>
	<link rel="stylesheet" type="text/css" href="style_edit.css">
</head>
<body>
	<div class="body">
			<div class="judul"><h1>Edit Soal</h1></div>
		<br>
		<form method="post" action=""> 
			<div align="left">

					<label for="isi_soal">Isi Soal</label>
					<br>
					<input type="text" id="isi_soal" autocomplete="off" name="isi_soal" value="<?php echo $row['isi_soal']; ?>">

					<label for="pilA">Pilihan A</label>
					<br>
					<input type="text" id="pilA" autocomplete="off" name="PilA" value="<?php echo $row['a']; ?>">

					<label for="pilB">Pilihan B</label>
					<br>
					<input type="text" id="pilB" autocomplete="off" name="PilB" value="<?php echo $row['b']; ?>">

					<label for="pilC">Pilihan C</label>
					<br>
					<input type="text" id="pilC" autocomplete="off" name="PilC" value="<?php echo $row['c']; ?>">

					<label for="pilD">Pilihan D</label>
					<br>
					<input type="text" id="pilD" autocomplete="off" name="PilD" value="<?php echo $row['d']; ?>">

					<label for="jawaban">Jawaban</label>
					<br>
					<input type="text" id="jawaban" autocomplete="off" name="jawaban" value="<?php echo $row['jawaban']; ?>">

			</div>

			<div align="center"><input class="button" type="submit" name="ubah" value="Ubah"></div>
		</form>
		<br>
	</div>

</body>
</html>