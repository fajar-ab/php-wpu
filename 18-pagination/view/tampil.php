<?php
include_once __DIR__ . '/../src/Mahasiswa.php';

$mahasiswa = new Mahasiswa;
$dataMahasiswa = $mahasiswa->tampil();

// aksi hapus
if (isset($_GET['hapus'])) {
  $mahasiswa->hapus($_GET['hapus']);

  if ($mahasiswa->barisTerpengaruh > 0) {
    header('location: index.php');
  }
}

// aksi cari
if (isset($_POST['submit'])) {
  $dataMahasiswa = $mahasiswa->cari($_POST['keyword']);
}

?>

<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6 text-muted">👩‍💻 Data Tampil</div>
      <div class="col-md-6 d-flex justify-content-end">
        <!-- input cari mahasiswa -->
        <form action="" method="post">
          <div class="input-group rounded">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="keyword" id=inputKeyword autofocus />
            <button class="input-group-text border-0" id="search-addon" type="submit" name="submit" id="tombolCari">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </form>
        <!-- input cari mahasiswa -->
        <!-- tombol tambah mahsiswa -->
        <a href="?halaman=tambah" class="btn btn-primary btn-sm py-2" href="">Tambah</a>
        <!-- tombol tambah mahsiswa -->
      </div>
    </div>
  </div>
  <div class="card-body">
    <div id="table-data">
      <!-- table mahahasiswa -->
      <div class="table-responsive-md">
        <table class="table align-middle text-nowrap">
          <thead class="">
            <tr>
              <th class="col-1" scope="col">No</th>
              <th class="col-1" scope="col">Gambar</th>
              <th scope="col">Nama</th>
              <th scope="col">NRP</th>
              <th scope="col">Email</th>
              <th scope="col">Jurusan</th>
              <th class="col-1 text-center" class="col">Aksi</th>
            </tr>
          </thead>
          <!-- cek apakah data mahasiswa ada atau tidak -->
          <?php if ($mahasiswa->jumlahBaris > 0) : ?>
            <tbody>
              <?php $no = 1 ?>
              <?php foreach ($dataMahasiswa as $h) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td>
                    <img src="upload/<?= $h['gambar'] ?>" alt="profil" style="width: 45px; height: 45px" class="rounded-circle" />
                  </td>
                  <td class="fw-bold"><?= $h['nama'] ?></td>
                  <td class="fw-normal"><?= $h['nrp'] ?></td>
                  <td class="text-muted">
                    <a href="mailto:<?= $h['email'] ?>"><?= $h['email'] ?></a>
                  </td>
                  <td>
                    <span class="badge rounded-pill badge-light  d-inline text-uppercase">
                      <?= $h['jurusan'] ?>
                    </span>
                  </td>
                  <th class="text-center">
                    <!-- tombol aksi ubah-->
                    <a class="btn btn-link btn-sm btn-rounded px-2" href="?halaman=ubah&id=<?= $h['id'] ?>">ubah</a>

                    <button type="button" class="btn btn-link btn-sm btn-rounded px-2" class="btn btn-primary" data-hapus="<?= $h['id'] ?>" id="tombol-hapus">
                      hapus
                    </button>
                  </th>
                </tr>
              <?php endforeach ?>
            </tbody>
          <?php else : ?>
            <!-- tampil jika data mahasiswa tidak ada -->
            <tfoot>
              <tr>
                <th class="text-center" colspan="7">
                  <div class="h4">🚫</div>
                  <div class="h5 fw-light">Data Tidak Ditemuka!</div>
                </th>
              </tr>
            </tfoot>
          <?php endif ?>
        </table>
      </div>
      <!-- table mahahasiswa -->
    </div>
  </div>
</div>

<script src="asset\js\hapus.js"></script>