<?php 

require_once "function.php";

if (isset($_POST['register'])) {

    if (register($_POST) > 0) {
        echo "
            <script>
                alert('user baru berhasil ditambahkan')
            </script>
        ";
    } else {
        echo mysqli_error($koneksi);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="css/registrasi.css">
</head>
<body>
    
    <h2>Halaman Registrasi</h2>

    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <label for="password2">Ualangi password</label>
        <input type="password" name="password2" id="password2">

        <button type="submit" name="register">Register</button>
    </form>

</body>
</html>