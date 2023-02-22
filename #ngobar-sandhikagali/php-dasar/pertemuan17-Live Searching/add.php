<?php

// start session
session_start();

// pengecekan sessioan

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require 'Koneksi/functions.php';
// Cek apakah tombol sudah di tekan atau belum

if (isset($_POST["sumbit"])) {

  // var_dump($_POST);
  // var_dump($_FILES);
  // die;


  // cek apakah data berhasil di tambah atau tidak
  if (tambah($_POST) > 0) {
    echo "
    <script>
     alert('Data berhasil di tambahkan!');
     document.location.href = 'index.php';
    </script>
    ";
  } else {
    echo "
    <script>
     alert('Data gagal di tambahkan!');
     document.location.href = 'index.php';
    </script>
    ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Mahasiswa</title>
</head>

<body>
  <h1>Tambah Data Mahasiswa</h1>

  <form action="" method="post" enctype="multipart/form-data">
    <label for="name">Name</label> <br>
    <input type="text" name="name" id="name" required> <br>
    <label for="NIM">NIM</label>
    <br>
    <input type="text" name="NIM" id="NIM" required> <br>
    <label for="email">Email</label> <br>
    <input type="email" name="email" id="email" required> <br>
    <label for="study_program">Study Program</label>
    <br>
    <input type="text" name="study_program" id="study_program" required> <br>
    <label for="image">Image</label> <br>
    <input type="file" name="image" id="image"> <br>
    <br>
    <button type="submit" name="sumbit">Tambah Data Mahasiswa</button>
  </form>
</body>

</html>