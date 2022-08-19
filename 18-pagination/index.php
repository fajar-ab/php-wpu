<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="asset/mdb/mdb.min.css">
  <link rel="stylesheet" href="asset/ohSnap/ohsnap.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <title>CRUD OOP</title>
</head>

<body>
  <div id="ohsnap"></div>
  <div class="container py-5">

    <?php

    @$halaman = $_GET['halaman'];

    switch ($halaman) {
      case 'tambah':
        require_once __DIR__ . '/view/tambah.php';
        break;
      case 'ubah':
        require_once __DIR__ . '/view/ubah.php';
        break;
      default:
        require_once __DIR__ . '/view/tampil.php';
    }

    ?>

  </div>
  <script src="asset/mdb/mdb.min.js"></script>
  <script src="asset/jquery/jquery-3.6.0.min.js"></script>
  <script src="asset/ohSnap/ohsnap.min.js"></script>
</body>

</html>