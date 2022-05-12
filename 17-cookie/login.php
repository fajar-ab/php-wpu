<?php
session_start();
require_once "function.php";

// * cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {

    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id di database
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE id = $id");

    $row = mysqli_fetch_assoc($result);

    if ($key === hash("sha256", $row['username'])) {
        $_SESSION['login'] = true;
    }
}



if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}


if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {

            // buat session
            $_SESSION['login'] = true;


            // * cek remember me
            if (isset($_POST['remember'])) {

                // buat cookie
                setcookie("id", $row['id'], time() + 60);
                setcookie("key", hash("sha256", $row['username']), time() + 60);

            }

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
    <link rel="stylesheet" href="css/registrasi.css?v=1">
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
        <input type="text" name="username" id="username" required autofocus>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <label for="remember">
            <input type="checkbox" name="remember" id="remember"> Remember Me
        </label>

        <button type="submit" name="login">Login</button>
    </form>

</body>

</html>