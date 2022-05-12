<?php
session_start();

require_once "function.php";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {

            header('Location: index.php');
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/registrasi.css">
    <style>
        .pesan {
            color: red;
            font-style: italic;
            text-align: center;
        }
    </style>
</head>

<body>

    <h2>Halaman Login</h2>

    <?php if (isset($error)) : ?>
        <p class="pesan">username / password salah</p>
    <?php endif; ?>

    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <button type="submit" name="login">Login</button>
    </form>

</body>

</html>