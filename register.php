<?php 
include('koneksi.php');

if (isset($_POST['daftar'])) {
	$nama_lengkap=$_POST['nama_lengkap'];
	$nama_panggilan=$_POST['nama_panggilan'];
	$tempat_lahir=$_POST['tempat_lahir'];
	$tanggal_lahir=$_POST['tanggal_lahir'];
	$bulan_lahir=$_POST['bulan_lahir'];
	$tahun_lahir=$_POST['tahun_lahir'];
	$jenis_kelamin=$_POST['jenis_kelamin'];
	$status=$_POST['status'];
	$alamat_desa=$_POST['alamat_desa'];
	$alamat_kabupaten=$_POST['alamat_kabupaten'];
	$alamat_provinsi=$_POST['alamat_provinsi'];
	$hobi=$_POST['hobi'];
	$nama_sekolah=$_POST['nama_sekolah'];
	$tempat_kerja=$_POST['tempat_kerja'];

	$username=$_POST['username'];

	$password=$_POST['password'];
	$confirm_password=$_POST['confirm_password'];


	$query="SELECT * FROM biodata WHERE username='$username'";
	$data=mysqli_query($conn, $query);
	$num=mysqli_num_rows($data);

	if ($num==1) {

		echo "<script>
			alert('username sudah ada!');
			</script>";
		
	}elseif ($num==0) {
		if ($password==$confirm_password) {
			$fixpassword=password_hash($password, PASSWORD_DEFAULT);
			$username=strtolower($username);
			
			$query="INSERT INTO biodata VALUES ('$username','$fixpassword','noprofil.jpg','$nama_lengkap','$nama_panggilan','$tempat_lahir','$tahun_lahir-$bulan_lahir-$tanggal_lahir','$jenis_kelamin','$status','$alamat_desa','$alamat_kabupaten','$alamat_provinsi','$hobi','$nama_sekolah','$tempat_kerja')";
			mysqli_query($conn,$query);

			if (mysqli_affected_rows($conn) > 0) {
				echo "<script>
				alert('Registrasi Berhasil');
				</script>";
			}else{
				echo "<script>
				alert('Registrasi Gagal');
				</script>";
			}
		}else
		{
			echo "<script>
				alert('password tidak sama, silahkan ulangi');
				</script>";
		}
	}


	
}
	

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Daftar</title>
	<link rel="stylesheet" type="text/css" href="style_register.css">
</head>
<body>

	<div class="body_register">

		<div class="judul"><h1> Silahkan Daftar</h1></div>
		<p style="color: red">*Penting : Username tidak boleh ada spasi </p>
		<form name="form_register" method="post" action="" enctype="multipart/form-data">
			<table cellpadding="10" cellspacing="0" align="center" width="100%">
				<tr>
					<td>
						<label for="nama_lengkap">Nama Lengkap</label> 
					</td>
					<td>
						<input id="nama_lengkap" type="text" name="nama_lengkap" placeholder="Masukan Nama Lengkap" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td>
						<label for="nama_panggilan">Nama Panggilan</label> 
					</td>
					<td>
						<input id="nama_panggilan" type="text" name="nama_panggilan" placeholder="Masukan Nama panggilan" autocomplete="off">
					</td>
				</tr>

				<tr>
					<td>
						<label for="tempat_lahir">Tempat Lahir</label> 
					</td>
					<td>
						<input id="tempat_lahir" type="text" name="tempat_lahir" placeholder="Masukan Tempat Lahir" autocomplete="off">
					</td>
				</tr>
				

				<tr>
					<td>
						<label>Tanggal Lahir</label>
					</td>
					<td>
						<select name="tanggal_lahir">
							<option>Tanggal</option>
							<?php for ($tanggal=01; $tanggal <= 31 ; $tanggal++) { 
								echo "<option>$tanggal</option>";
							} ?>

						</select>

						<select name="bulan_lahir">
							<option>Bulan</option>
							<?php for ($bulan=01; $bulan <= 12 ; $bulan++) { 
								echo "<option>$bulan</option>";
							} ?>

						</select>

						<select name="tahun_lahir">
							<option>Tahun</option>
							<?php 
								$thn=getdate();

							for ($tahun=1889; $tahun <= $thn['year']; $tahun++) { 
								echo "<option>$tahun</option>";
							} ?>

						</select>
					</td>
				</tr>

				<tr>
					<td>
						<label>Jenis Kelamin</label>
					</td>
					<td>
						<select name="jenis_kelamin">
							<option>Pria</option>
							<option>Wanita</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<label>Status</label>
					</td>
					<td>
						<select name="status">
							<option>Siswa</option>
							<option>Mahasiswa</option>
							<option>Guru</option>
							<option>Dosen</option>
							<option>Karyawan</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<label>Alamat</label>
					</td>
					<td>
						<input type="text" name="alamat_desa" placeholder="desa" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="text" name="alamat_kabupaten" placeholder="kabupaten" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="text" name="alamat_provinsi" placeholder="provinsi" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td>
						<label>Hobi</label>
					</td>
					<td>
						<input type="text" name="hobi" placeholder="Masukan hobi" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td>
						<label>Nama Sekolah</label>
					</td>
					<td>
						<input type="text" name="nama_sekolah" placeholder="Masukan nama sekolah" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td>
						<label>Tempat Kerja</label>
					</td>
					<td>
						<input type="text" name="tempat_kerja" placeholder="Masukan tempat anda bekerja" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td>
						<label>Username</label>
					</td>
					<td>
						<input required type="text" name="username" placeholder="Masukan username" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td>
						<label>Password</label>
					</td>
					<td>
						<input required type="password" name="password" placeholder="Masukan password">
					</td>
					
				</tr>
				<tr>
					<td>
						<label>Confirm Password</label>
					</td>
					<td>
						<input required type="password" name="confirm_password" placeholder="Masukan ulang password">
					</td>
				</tr>
				
			</table>
			<div align="center">
				<input class="button" type="submit" name="daftar" value="Daftar">
			</div>
			
			
		</form>
		<p class="sudahpunyaakun">Sudah punya akun? <a class="link" href="login.php">Masuk</a></p>
	</div>
	

</body>
</html>