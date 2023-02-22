<?php
// Menggunakan fungsi isset mengecek apkah data nya sudah pernah dipakai atau belum jika belum maka lanjutkan ke halaman selanjutnya jika sudah maka kembali ke halaman utama.
if (
  !isset($_GET["nama"]) ||
  !isset($_GET["NIM"]) || !isset($_GET["jurusan"]) || !isset($_GET["email"])
) {

  // redirect
  header("Location:latihanGET.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
</head>

<body>
  <h1>Detail Mahasiswa</h1>
  <ul>
    <li><?= $_GET["nama"]; ?></li>
    <li><?= $_GET["NIM"]; ?></li>
    <li><?= $_GET["jurusan"]; ?></li>
    <li><?= $_GET["email"]; ?></li>
  </ul>
</body>

<a href="latihanGET.php">Kembali</a>

</html>