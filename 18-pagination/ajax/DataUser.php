<?php
require_once __DIR__ . '/../src/Mahasiswa.php';

$keyword = $_GET['keyword'];

$mahasiswa = new Mahasiswa;
$data = $mahasiswa->cari($keyword);
?>

<table class="table">
  <thead class="table-dark">
    <tr>
      <th class="col">No</th>
      <th class="col">Nama</th>
      <th class="col">Alamat</th>
      <th class="col">Usia</th>
      <th class="col-3 text-center" class="col">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1 ?>
    <?php foreach ($data as $mhs) : ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $mhs['nama'] ?></td>
        <td><?= $mhs['alamat'] ?></td>
        <td><?= $mhs['usia'] ?></td>
        <th class="text-center">
          <a class="btn btn-link btn-sm btn-rounded" href="?halaman=ubah&id=<?= $mhs['id'] ?>">ubah</a>
          <a class="btn btn-link btn-sm btn-rounded" href="?hapus=<?= $mhs['id'] ?>">Hapus</a>
        </th>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>