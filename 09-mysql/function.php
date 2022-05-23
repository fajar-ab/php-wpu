<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "tutorial_php_wpu");


function query(string $sql): array
{
    global $conn;

    $result = mysqli_query($conn, $sql);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
