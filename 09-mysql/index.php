<?php

require_once('function.php');

$mahasiswa = query("SELECT * FROM mahasiswa");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <table class="content-table">
        <thead>
            <tr>
                <th colspan="7">DAFTAR MAHASISWA</th>
            </tr>
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
                        <a href="">ubah</a> | <a href="">hapus</a>
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
        </tbody>
    </table>
</body>

</html>