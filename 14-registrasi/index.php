<?php
require_once "function.php";

$mahasiswa = query("SELECT * FROM mahasiswa");

if (isset($_POST['cari'])) {
    $mahasiswa = cari($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil</title>
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/cari.css">
</head>

<body>

    <h2>Daftar Mahasiswa</h2>

    <a href="tambah.php">tambah mahasiswa baru</a>

    <form action="" method="POST">
        <input type="text" name="keyword" autocomplete="off" autofocus placeholder="ketikkan keyword">
        <button type="submit" name="cari">Cari</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($mahasiswa as $mhs) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $mhs['id'] ?>">ubah</a> |
                        <a href="hapus.php?id=<?= $mhs['id'] ?>" id="hapus">hapus</a>
                    </td>
                    <td class="foto">
                        <img src="img/<?= $mhs['gambar'] ?>" alt="foto">
                    </td>
                    <td><?= $mhs['nrp']; ?></td>
                    <td><?= $mhs['nama']; ?></td>
                    <td><?= $mhs['email']; ?></td>
                    <td><?= $mhs['jurusan'] ?></td>
                </tr>
            <?php
                $no++;
            endforeach; ?>
        </tbody>
    </table>

<script src="js/script.js"></script>
</body>

</html>