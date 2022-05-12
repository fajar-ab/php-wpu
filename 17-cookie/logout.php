<?php 
session_start();

// hapus sesion
$_SESSION = [];
session_unset();
session_destroy();

// hapus sesion
setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);

header("Location: login.php");
exit;