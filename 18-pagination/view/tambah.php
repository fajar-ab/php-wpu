<?php
require_once __DIR__ . '/../src/Mahasiswa.php';

// aksi tambah mahasiswa
if (isset($_POST['simpan'])) {

  $mahasiswa = new Mahasiswa;
  $result = $mahasiswa->simpan($_POST);

  if ($mahasiswa->barisTerpengaruh > 0) {
    header('location: index.php');
  } else {
    header('location: index.php?halaman=tambah');
  }
}
?>

<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card mx-auto">
      <div class="card-header text-muted">💾 Tambah</div>
      <div class="card-body">
        <!-- form tambah data mahasiswa -->
        <form action="" method="post" enctype="multipart/form-data">

          <div class="row">
            <div class="col-md-7">
              <div class="form-outline">
                <input class="form-control" type="text" id="inputNrp" name="nrp" required>
                <label class="form-label" for="inputNrp">NRP</label>
              </div>

              <div class="form-outline mt-3">
                <input class="form-control" type="text" id="inputNama" name="nama" required>
                <label class="form-label" for="inputNama">Nama</label>
              </div>

              <div class="form-outline mt-3">
                <input class="form-control" type="email" id="inputEmail" name="email" required>
                <label class="form-label" for="inputEmail">Email</label>
              </div>

              <div class="form-outline mt-3">
                <input class="form-control" type="text" id="inputJurusan" name="jurusan" required>
                <label class="form-label" for="inputJurusan">Jurusan</label>
              </div>
            </div>
            <div class="col-md-5">
              <div class="mt-3 mt-md-0">
                <div class="bg-light w-100 rounded text-center p-3" style="border:3px dashed darkgrey;cursor: pointer;" id="upload-zone">
                  <img class="w-75" src="upload/default.png">
                </div>
                <label class="form-label mt-2" for="upload-gamabar" id="upload-label">Upload gambar anda</label>
                <input class="d-none" type="file" id="upload-gambar" name="gambar" />
              </div>
            </div>
          </div>
          <div class="mt-3 ">
            <button class="btn btn-primary px-4" type="submit" name="simpan">sipan</button>
            <a class="btn btn-success" href="?halaman=tampil">kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="asset\js\upload-gambar.js"></script>