<?php

require_once "function.php";

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil di tambahkan');
                document.location.href = 'index.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal berhasil di tambahkan');
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data mahasiswa</title>
    <link rel="stylesheet" href="css/tambah-style.css">
</head>

<body>

    <div class="container">

        <div class="title">
            <h1>TAMBAH DATA MAHASISWA</h1>
            <a href="index.php">kembali</a>
        </div>

        <form action="" method="POST">

            <label for="nrp">NRP</label>
            <input type="text" name="nrp" id="nrp" required>

            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" required>

            <label for="email">Email</label>
            <input type="text" name="email" id="email" required>

            <label for="jurusan">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" required>

            <label for="gambar">Gambar</label>
            <input type="text" name="gambar" id="gambar">

            <button type="submit" name="submit">Tambah Data</button>

        </form>
    </div>

</body>

</html>