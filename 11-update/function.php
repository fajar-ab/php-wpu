<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "belajar_php_wpu");

// fungtion menampilkan data
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


// function tambah data
function tambah($data) 
{
    global $conn;

    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = ($data['gambar'] === "") ? "default.jpg" : htmlspecialchars($data['gambar']); 

    $query = 
    "INSERT INTO mahasiswa 
        VALUES ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
} 


// function hapus data
function hapus($id) 
{
    global $conn;

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id;");

    return mysqli_affected_rows($conn);
}


// function ubah data
function ubah($data) 
{
    global $conn;

    $id = $data['id'];
    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = ($data['gambar'] === "") ? "default.jpg" : htmlspecialchars($data['gambar']); 

    $query = 
    "UPDATE mahasiswa SET
        nrp = '$nrp',
        nama = '$nama',
        email = '$email',
        jurusan = '$jurusan',
        gambar = '$gambar'
        WHERE id = $id
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}