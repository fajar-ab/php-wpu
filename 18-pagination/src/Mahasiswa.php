<?php
include_once __DIR__ . "/Database.php";
include_once __DIR__ . "/Gambar.php";

class Mahasiswa
{
  private ?mysqli $koneksi = null;
  private ?mysqli_result $result = null;
  private ?mysqli_stmt $statement = null;

  public int $jumlahBaris;
  public int $barisTerpengaruh = 0;

  public function __construct()
  {
    $this->koneksi = Database::getConnection();
  }

  public function tampil()
  {
    $sql = "SELECT * FROM mahasiswa";
    $this->result = $this->koneksi->query($sql);
    $this->jumlahBaris = $this->result->num_rows;

    return $this->result->fetch_all(MYSQLI_ASSOC);
  }

  public function tampilDenganId($id)
  {
    $sql = "SELECT * FROM mahasiswa WHERE id = ?";
    $this->statement = $this->koneksi->prepare($sql);
    $this->statement->execute([$id]);
    $this->result = $this->statement->get_result();

    return $this->result->fetch_all(MYSQLI_ASSOC);
  }

  public function simpan(array $data)
  {
    $sql = "INSERT INTO mahasiswa VALUES (NULL, ?, ?, ?, ?, ?)";
    $this->statement = $this->koneksi->prepare($sql);
    $this->statement->bind_param('sssss', $nrp, $nama, $email, $jurusan, $gambar);

    $nrp      = htmlspecialchars(trim($data['nrp']));
    $nama     = htmlspecialchars(trim($data['nama']));
    $email    = htmlspecialchars(trim($data['email']));
    $jurusan  = trim($data['jurusan']);

    $gambar = upload();
    $gambar = $gambar == "" ? "default.png" : $gambar;

    $this->statement->execute();
    $this->barisTerpengaruh = $this->statement->affected_rows;
  }

  public function ubah(array $data)
  {
    $sql = "UPDATE mahasiswa SET 
      nrp = ?, nama = ?,  email = ?, jurusan = ?, gambar = ? WHERE id = ?";

    $this->statement = $this->koneksi->prepare($sql);
    $this->statement->bind_param('sssssi', $nrp, $nama, $email, $jurusan, $gambar, $id);

    $id       = $data['id'];
    $nrp      = htmlspecialchars(trim($data['nrp']));
    $nama     = htmlspecialchars(trim($data['nama']));
    $email    = htmlspecialchars(trim($data['email']));
    $jurusan  = htmlspecialchars(trim($data['jurusan']));

    // upload gambar
    $gambarLama = $data["gambarLama"];
    $gambar = upload();
    $gambar = $gambar == "" ? $gambarLama : $gambar;

    $this->statement->execute();
    $this->barisTerpengaruh = $this->statement->affected_rows;
  }

  public function hapus(int $id)
  {
    $sql = "DELETE FROM mahasiswa WHERE id = ?";
    $this->statement = $this->koneksi->prepare($sql);
    $this->statement->execute([$id]);
    $this->barisTerpengaruh = $this->statement->affected_rows;
  }

  public function cari($keywords)
  {

    $keyword = "{$keywords}%";

    $sql = "SELECT * FROM mahasiswa WHERE 
      nama LIKE ? OR nrp LIKE ? OR email LIKE ? OR jurusan LIKE ?";

    $this->statement = $this->koneksi->prepare($sql);
    $this->statement->bind_param('ssss', $keyword, $keyword, $keyword, $keyword);
    $this->statement->execute();

    $this->result = $this->statement->get_result();
    $this->jumlahBaris = $this->result->num_rows;

    return $this->result->fetch_all(MYSQLI_ASSOC);
  }

  public function __destruct()
  {
    if (!is_null($this->koneksi)) {
      $this->koneksi->close();
    } elseif (!is_null($this->statement)) {
      $this->statement->close();
    } elseif (!is_null($this->result)) {
      $this->result->close();
    }
  }
}
