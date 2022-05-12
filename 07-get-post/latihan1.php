<?php 

// SUPERGLOBALS
// variable global milik PHP
// merupakan Arrays Associative

require_once "books.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>GET</title>
</head>
<body>

    <h1>Daftar Buku</h1>
    <ul>
    <?php foreach ( $books as $book ) : ?>
        <li>
            <a href="latihan2.php?judul=<?= $book["judul"] ?>&cover=<?= $book["cover"] ?>&pengarang=<?= $book["pengarang"] ?>&penerbit=<?= $book["penerbit"] ?>&halaman=<?= $book["jumlah_halaman"] ?>&publikasi=<?= $book["publikasi"] ?>"><?= $book["judul"] ?></a>
        </li>
    <?php endforeach; ?>
    </ul>
    
</body>
</html>