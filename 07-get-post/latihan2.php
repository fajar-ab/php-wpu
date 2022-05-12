<!DOCTYPE html>
<?php 

// cek apakah tidak ada data di get

if (!isset($_GET["judul"]) ||
    !isset($_GET["cover"]) || 
    !isset($_GET["pengarang"]) || 
    !isset($_GET["penerbit"]) || 
    !isset($_GET["publikasi"]) || 
    !isset($_GET["halaman"]) 
    ) {
    // redirect
    header("Location: latihan1.php");
    exit;
}

?>

<html lang="en">
<head>
    <title>Detail Buku</title>
    <style>
        img {border-radius: 10px}
        .utama {width: 200px}
        h2 {text-align: center}
    </style>
</head>
<body>
    
    <div class="utama">
        <img src="img/<?= $_GET["cover"] ?>" alt="">
        <h2><?= $_GET["judul"] ?></h2>
        <p>Pengarang: <?= $_GET["pengarang"] ?></p>
        <p>Penerbit : <?= $_GET["penerbit"] ?></p>
        <p>Rilis : <?= $_GET["publikasi"] ?></p>
        <p>Halaman : <?= $_GET["halaman"] ?></p>
    </div>

    <a href="latihan1.php">kembali</a>
    

</body>
</html>