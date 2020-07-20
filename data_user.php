<?php
session_start();

	if (!isset($_SESSION['username_admin'])) {
		
		header('location:login_admin.php');
	}

 include('koneksi.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Data User</title>
	<link rel="stylesheet" type="text/css" href="style_data_user.css">
</head>
<body>

	<header align="center" >
		<table align="center" class="header">
			<tr>
				<td><a class="aktif" href="data_user.php">GRADE</a></td>
				<td><a  class="header" href="quiz_admin.php">QUIZ</a></td>
			</tr>
		</table>
	</header>

	<div class="body_data_user">
		<div class="judul"><h1>GRADE USER</h1></div>

	<div align="right">
	<a class="link" href="logout_admin.php">Logout</a>
	</div>


		<table align="center" border="3" cellpadding="10" cellspacing="0" >
			<tr>
				<th>USERNAME</th>
				<!-- <th>PASSWORD</th> -->
				<th>NAMA</th>
				<th>SOAL</th>
				<th>NILAI</th>
				<th>AKSI</th>
			</tr>

			<?php 
				$query="SELECT biodata.username, biodata.nama_lengkap, grade.nama_soal, grade.nilai, grade.id_grade FROM biodata INNER JOIN grade ON biodata.username = grade.username";
				$data=mysqli_query($conn,$query);

				while ($r=mysqli_fetch_array($data)) {
			?>
			<tr>
				<td><?php echo $r['username']; ?></td>
				<!-- <td><?php echo $r['password']; ?></td> -->
				<td><?php echo $r['nama_lengkap']; ?></td>
				<td><?php echo $r['nama_soal']; ?></td>
				<td><?php echo $r['nilai']; ?></td>
				<td><a class="link" href="admin_hapus_grade.php?id=<?php echo $r['id_grade']; ?>" onclick="return confirm('Anda yakin?')">Hapus</a></td>
			</tr>
			<?php
				}
			 ?>

			
		</table>

	</div>
</body>
</html>