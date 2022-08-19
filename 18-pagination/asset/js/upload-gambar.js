const uploadZone = document.querySelector("#upload-zone");
const uploadLabel = document.querySelector("#upload-label");
const uploadGambar = document.querySelector("#upload-gambar");

uploadZone.addEventListener("click", () => uploadGambar.click());
uploadGambar.addEventListener("input", ubahDisplayGambar);

function ubahDisplayGambar() {
  const curFile = uploadGambar.files[0];
  const urlGambar = URL.createObjectURL(curFile);

  if (falidGambar(curFile.type)) {
    if (curFile.size < 2_097_152) {
      uploadLabel.textContent = curFile.name;
      uploadZone.innerHTML = `<img class="w-75" src="${urlGambar}">`;
    } else {
      uploadGambar.value = "";
      swal({ text: "file harus kurang dari 2MB", icon: "warning" });
      return;
    }
  } else {
    uploadGambar.value = "";
    swal({ text: "Upload file dengan extensi .png dan .jpg", icon: "warning" });
    return;
  }
}

function falidGambar(type) {
  const validType = ["image/jpg", "image/png", "image/jpeg"];
  return validType.includes(type);
}
