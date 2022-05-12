<?php 
require_once "function.php";

// ambil data di url
$id = $_GET['id'];

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


if (isset($_POST['submit'])) {

	// cek apakah data berhasil diubah
	if (ubah($_POST) > 0) {
		echo " 
			<script>
				alert('data berhasil diubah')
				document.location.href = 'index.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah')
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
	<title>Ubah Data</title>
	<link rel="stylesheet" href="css/form.css">
	<style>
		img {
			width: 120px;
			position: absolute;
			border: 3px solid white;
			top: 113px;
			left: 420px;
			box-shadow: 0 0 10px rgba(172, 172, 172, 0.781);
		}
	</style>
</head>
<body>

	<h2>Ubah Data Mahasiswa</h2>

	<a href="index.php">kembali</a>

	<form action="" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs['id']; ?>">	
		<input type="hidden" name="gambarLama" value="<?= $mhs['gambar']; ?>">	

		<label for="nrp">NRP</label>
		<input type="text" name="nrp" id="nrp" required value="<?= $mhs['nrp']; ?>">

		<label for="nama">Nama</label>
		<input type="text" name="nama" id="nama" required value="<?= $mhs['nama']; ?>">

		<label for="email">Email</label>
		<input type="text" name="email" id="email" required value="<?= $mhs['email']; ?>">

		<label for="jurusan">Jurusan</label>
		<input type="text" name="jurusan" id="jurusan" required value="<?= $mhs['jurusan']; ?>">
		
		<label for="gambar">Gambar</label>
		<input type="file" name="gambar" id="gambar">

		<button type="submit" name="submit">Ubah</button>
	</form>

	<img src="img/<?= $mhs['gambar'] ?>" alt="gambar">

</body>
</html>