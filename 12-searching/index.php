<?php

require_once('function.php');

$mahasiswa = query("SELECT * FROM mahasiswa");

// ketika tombol cari ditekan jalankan perintah berkut
if (isset($_POST['cari'])) {
    $mahasiswa = cari($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="css/index-style.css">
</head>

<body>

    <div class="container">

        <div class="title">
            <h1>DAFTAR MAHASISWA</h1>
            <a href="tambah.php">Tambah Data Mahasiswa</a>
        </div>

        <form action="" method="POST">
            <input type="text" name="keyword" id="" autofocus placeholder="masukkan keyword pencarian">
            <button type="submit" name="cari">Cari</button>
        </form>

        <table class="content-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>AKSI</th>
                    <th>GAMBAR</th>
                    <th>NRP</th>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>JURUSAN</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($mahasiswa as $row) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td>
                            <a href="ubah.php?id=<?= $row['id']; ?>">ubah</a> |
                            <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('yakin')">hapus</a>
                        </td>
                        <td>
                            <img src="img/<?= $row['gambar']; ?>">
                        </td>
                        <td><?= $row['nrp']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['jurusan']; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
                
                <?php if (count($mahasiswa) == 0) : ?>
                <tfoot>
                    <tr>
                        <th colspan="7">Data Kosong</th>
                    </tr>
                </tfoot>
                <?php endif; ?>
            </tbody>
        </table>

    </div>

</body>

</html>