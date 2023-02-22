<?php

// start session
session_start();

// pengecekan sessioan

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require 'Koneksi/functions.php';



$students = query("SELECT * FROM mahasiswa ORDER BY id DESC ");

// tombol cari di tekan
if (isset($_POST["cari"])) {
  $students = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>

  <style>
  h1 {
    text-align: center;
    font-family: sans-serif;
    font-size: 30px;
    margin-top: 20px;
    margin-bottom: 20px;
  }

  h2 {
    text-align: center;
    font-family: sans-serif;
    font-size: 20px;
    margin-top: 20px;
    margin-bottom: 20px;
  }

  table {
    text-align: center;
    width: 100%;
    margin-top: 10px;
    margin-bottom: 20px;
  }

  .cetak,
  .logout,
  .tambah {
    text-decoration: none;
    font-family: sans-serif;
    margin-right: 20px;
    margin-bottom: 50px;
    margin-top: 50px;
    font-size: 20px;
  }

  form {
    margin-top: 20px;
  }
  </style>


</head>

<body>
  <h1>Selamat Datang Admin</h1>
  <h2>DATA MAHASISWA UNIVERSITAS KRISTEN IMMANUEL</h2>
  <div class="container-fluid">
    <a href="add.php" class="tambah">Add New Student</a>
    <a href="logout.php" class="logout">Logout</a>

    <a href="cetakpdf.php" class="cetak" target="blank">Cetak PDF</a>

    <!-- Form untuk pencarian data mahasiswa -->

    <form action="" method="POST">

      <input type="text" name="keyword" size="50" autofocus placeholder="Masukan keyword pencarian.." autocomplete="off"
        id="keyword">
      <button type="submit" name="cari" id="tombol-cari">Cari..!</button>

    </form>

    <br>

    <div id="container">
      <table border="1" cellpadding="10" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>NIM</th>
            <th>Email</th>
            <th>Study Program</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $nomor = 1; ?>
          <?php foreach ($students as $student) : ?>
          <tr>
            <td style="text-align: center;"><?= $nomor++ ?></td>
            <td><?= $student["name"] ?></td>
            <td><?= $student["NIM"] ?></td>
            <td><?= $student["email"] ?></td>
            <td><?= $student["study_program"] ?></td>
            <td style="text-align: center;"><img src="/image/<?= $student["image"] ?>" width="100px" height="50px"
                alt="Johni Revormasi Ziliwu"></td>
            <td style="text-align: center;">
              <a href="update.php?id=<?= $student["id"] ?>">Upadate</a> |
              <a href="delete.php?id=<?= $student["id"] ?>"
                onclick="return confirm('Anda Yakin Hapus Data ini ?')">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Javascript -->
    <script src="js/script.js"></script>

</body>

</html>