<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "belajar_php_wpu");

// ambil data dari table mahasiswa / melakukan query ke database mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// memuncul kan error
// if (!$result) {
//     echo mysqli_error($conn);
// }

// ambil data (fetch) mahasiswa dari object result

// $mahasiswa = mysqli_fetch_row($result);
// mengembalikan array numerik

// $mahasiswa = mysqli_fetch_assoc($result);
// mengembalikan array asosiatif

// $mahasiswa = mysqli_fetch_array();
// mengembalikan array numerik dan asosiatif

// $mahasiswa = mysqli_fetch_object()
// mengembalikan object

// while ($mahasiswa = mysqli_fetch_assoc($result)) {
//     var_dump($mahasiswa['nama']);
// }

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
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
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
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>