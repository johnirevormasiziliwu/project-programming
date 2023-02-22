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
  body {
    font-family: sans-serif;
  }

  h1 {
    text-align: center;
    font-family: sans-serif;
    margin-top: 30px;
    color: green;
  }

  h1:hover {
    color: blue;
    transform: rotate(360deg);
    transition: all;

  }

  h2 {
    text-align: center;
    font-family: sans-serif;
    margin-top: 20px;
    text-decoration: underline;
  }

  table {
    margin: auto;
    width: 100%;
    margin-bottom: 20px;


  }

  thead {
    background-color: gray;
    color: white;
    font-family: sans-serif;
    font-size: 15px;
    font-weight: bold;
  }

  .tambah {
    background-color: #008CBA;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-top: 10px;
    margin-bottom: 10px;


  }

  .tambah:hover {
    background-color: #e7e7e7;
    color: black;

  }

  .logout {
    background-color: red;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-top: 10px;
    margin-bottom: 10px;


  }
  </style>


</head>

<body>

  <h1>Selamat Datang Admin</h1>
  <h2>Daftar Mahasiswa Universitas Kristen Immanuel</h2>
  <div class="container-fluid">
    <a href="add.php" class="tambah">Add New Student</a>
    <a href="logout.php" class="logout">Logout</a>

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