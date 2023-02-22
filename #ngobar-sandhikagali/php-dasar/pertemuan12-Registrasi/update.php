<?php

require 'Koneksi/functions.php';

// ambil data di URL 

$id = $_GET["id"];

// ambil semua data mahasiswa berdasakan id

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// query data mahasiswa berdasakan id

// Cek apakah tombol sudah di tekan atau belum

if (isset($_POST["sumbit"])) {
  // cek apakah data berhasil di ubah
  if (ubah($_POST) > 0) {
    echo "
    <script>
     alert('Data berhasil di ubah!');
     document.location.href = 'index.php';
    </script>
    ";
  } else {
    echo "
    <script>
     alert('Data gagal di ubah!');
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
  <title>Ubah Data Mahasiswa</title>
</head>

<body>
  <h1>Ubah Data Mahasiswa</h1>

  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
    <input type="hidden" name="gambarLama" value="<?= $mhs["image"]; ?>">
    <label for="name">Name</label> <br>
    <input type="text" value="<?= $mhs["name"]; ?>" name="name" id="name" required> <br>
    <label for="NIM">NIM</label>
    <br>
    <input type="text" value="<?= $mhs["NIM"]; ?>" name=" NIM" id="NIM" required> <br>
    <label for="email">Email</label> <br>
    <input type="email" value="<?= $mhs["email"]; ?> " name="email" id="email" required> <br>
    <label for="study_program">Study Program</label><br>
    <input type="text" value="<?= $mhs["study_program"]; ?> " name="study_program" id="study_program" required> <br>
    <label for="image">Image</label> <br>
    <img src="/image/<?= $mhs["image"]; ?>" alt="Gambar" style="margin-top: 10px; margin-bottom: 10px;" width="200px"
      height="100px"> <br>
    <input type="file" name="image" id="image"><br>
    <br>
    <button type="submit" name="sumbit">Ubah Data Mahasiswa</button>

  </form>
</body>

</html>