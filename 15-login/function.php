<?php

// koneksi kedatabases
$koneksi = mysqli_connect("localhost", "root", "", "tutorial_php_wpu");
// $pesanKoneksi = $koneksi ? "koneksi berhasil" : "koneksi gagal";
// echo $pesanKoneksi;


// fungsi mengambil data dari databases
function query($sql)
{
    global $koneksi;

    $hasil = mysqli_query($koneksi, $sql);

    $rows = [];
    while ($data = mysqli_fetch_assoc($hasil)) {
        $rows[] = $data;
    }

    return $rows;
}

// fungsi menabah data ke database
function tambah($data)
{
    global $koneksi;

    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);

    // upload gambar
    $gambar = upload();

    if (!$gambar) {
        return  false;
    }

    $sql = "INSERT INTO 
            mahasiswa 
            VALUES 
            (null, '$nrp', '$nama', '$email', '$jurusan', '$gambar')
    ";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}


// fungsi untuk upload
function upload() {

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tempFile = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "
            <script>
                alert('pilih gambar terlebih dahulu')
            </script>
        ";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
                alert('yang anda uplod bukan gambar')
            </script>
        ";
        return false;
    }

    // cek jika ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        echo "
            <script>
                alert('ukuran gambar terlalu besar')
            </script>
        ";
        return false;
    }


    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;


    // lolos pengecekan gambar siap diupload
    move_uploaded_file($tempFile, "img/" . $namaFileBaru);

    return $namaFileBaru;
}


// fungsi menghapus data
function hapus($id)
{
    global $koneksi;

    $sql = "DELETE FROM mahasiswa WHERE id = $id";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}


// fungsi mengubah data
function ubah($data)
{
    global $koneksi;

    $id = $data['id'];
    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambarLama = $data['gambarLama'];


    // cek apakah user memilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $sql = "UPDATE mahasiswa 
            SET 
            nrp = '$nrp',
            nama = '$nama',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
            WHERE id = $id;
    ";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}


// fungsi cari data
function cari($keyword)
{
    $sql = "SELECT * FROM mahasiswa 
            WHERE 
            nama LIKE '%$keyword%' OR
            nrp LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
    ";

    return query($sql);
}


// fungsi registrasi
function register($data)
{
    global $koneksi;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($koneksi, $data['password']);
    $password2 = mysqli_real_escape_string($koneksi, $data['password2']);

    // cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script> 
                alert('username sudah terdaftar')
            </script>
        ";
        return false;
    }

    if ($password !== $password2) {
        echo "
            <script> 
                alert('konfirmasi password tidak sesuai')
            </script>
        ";
        return false;
    }

    // encripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
 
    // query
    mysqli_query(
        $koneksi,
        "INSERT INTO user (username, password) VALUES ('$username', '$password')"
    );

    return mysqli_affected_rows($koneksi);
}