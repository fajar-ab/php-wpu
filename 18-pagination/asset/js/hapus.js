const tombolHapus = document.querySelectorAll("#tombol-hapus");

for (const tombol of tombolHapus) {
  tombol.addEventListener("click", function () {
    const id = this.getAttribute("data-hapus");
    console.log(id);
    swal({
      text: "Apakah anda yakin ingin menghapus data ini?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        location.href = `?hapus=${id}`;
      }
    });
  });
}
