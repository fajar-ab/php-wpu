<?php


function upload()
{
  $fileGambar = (object) $_FILES["gambar"];

  if ($fileGambar->error === 4) {
    return "";
  }

  $path = "upload/";
  $extensiFile = strtolower(pathinfo($fileGambar->name, PATHINFO_EXTENSION));
  $namaFile = uniqid() . "." . $extensiFile;
  $target = $path . $namaFile;

  var_dump($namaFile);
  var_dump($target);

  move_uploaded_file($fileGambar->tmp_name, $target);
  return $namaFile;
}
