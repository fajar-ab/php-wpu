<?php 
session_start();

if (!$_SESSION['login']) {
    header("Location: login.php");
    exit;
}

require_once "function.php";

if (isset($_POST['submit'])) {
	
	// cek apakah data berhasil ditambahkan
	if (tambah($_POST) > 0) {
		echo " 
			<script>
				alert('data berhasil ditambahkan')
				document.location.href = 'index.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan')
			</script>
		";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Data</title>
	<link rel="stylesheet" href="css/form.css">
</head>
<body>

	<h2>Tambah Data Mahasiswa</h2>

	<a href="index.php">kembali</a>

	<form action="" method="POST" enctype="multipart/form-data">
		<label for="nrp">NRP</label>
		<input type="text" name="nrp" id="nrp" required>

		<label for="nama">Nama</label>
		<input type="text" name="nama" id="nama" required>

		<label for="email">Email</label>
		<input type="text" name="email" id="email" required>

		<label for="jurusan">Jurusan</label>
		<input type="text" name="jurusan" id="jurusan" required>
		
		<label for="gambar">Gambar</label>
		<input type="file" name="gambar" id="gambar">

		<button type="submit" name="submit">Tambah</button>
	</form>

</body>
</html>