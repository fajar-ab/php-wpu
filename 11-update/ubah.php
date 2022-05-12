<?php 

require_once "function.php";

// tangkap nilai id dari url
$id = $_GET['id'];

// lakukan query ke database berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


if (isset($_POST['submit'])) {

    // jika ubah tidak ada error masuk ke function ubah
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil di ubah');
                document.location.href = 'index.php'
            </script>
        ";
    } else {
    
        echo "
            <script>
                alert('data gagal berhasil di ubah');
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
    <title>Ubah data mahasiswa</title>
    <link rel="stylesheet" href="css/tambah-style.css">
</head>
<body>
    <div class="title">
        <h1>UBAH DATA MAHASISWA</h1>
        <a href="index.php">kembali</a>
    </div>

    <div class="form">
        <form action="" method="POST">
            <ul>
                <input type="hidden" name="id" id="" value="<?= $mhs['id']; ?>">
                <li>
                    <label for="nrp">NRP</label>
                    <input type="text" name="nrp" id="nrp" required value="<?= $mhs['nrp']; ?>">
                </li>
                <li>
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" required value="<?= $mhs['nama']; ?>">
                </li>
                <li>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required value="<?= $mhs['email']; ?>">
                </li>
                <li>
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs['jurusan']; ?>">
                </li>
                <li>
                    <label for="gambar">Gambar</label>
                    <input type="text" name="gambar" id="gambar" value="<?= $mhs['gambar']; ?>">
                </li>
                <li>
                    <button type="submit" name="submit" >Ubah Data</button>
                </li>
            </ul>
        </form>
    </div>

</body>
</html>