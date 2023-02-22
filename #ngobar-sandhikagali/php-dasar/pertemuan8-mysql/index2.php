<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "php_dasar");

// ambil data dari tabel mahasiswa / query data mahasiswa

$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// Ambil data (fetch) mahasiswa dari object result
// mysqli_fetch_row() // Mengembalikan arrya numerik
// $mhs = mysqli_fetch_row($result);
// var_dump($mhs);
// echo "<br>";


// mysqli_fetch_array() // mengembalikan keduanya row dan assosiative

// $mhs = mysqli_fetch_array($result);
// var_dump($mhs);

// mysqli_fetch_object()
// $mhs = mysqli_fetch_object($result);
// var_dump($mhs->name);

// mysqli_fetch_assoc() // mengembalikan string atau nama field yang ada di database
// while ($mhs = mysqli_fetch_assoc($result)) {
//   var_dump($mhs);
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
</head>

<body>
  <h1>Daftar Mahasiswa</h1>

  <table border="1" cellpadding="10" cellspacing="0" width="100%">

    <tr>
      <th>No</th>
      <th>Image</th>
      <th>NIM</th>
      <th>Name</th>
      <th>Email</th>
      <th>Study Program</th>
      <th>Action</th>
    </tr>
    <?php $nomor = 1; ?>
    <?php while ($mhs = mysqli_fetch_assoc($result)) : ?>

    <tr>

      <td><?= $nomor++ ?></td>
      <td><img src="/image/johni.jpg" Johni Revormasi Ziliwu" width="100px"></td>
      <td><?= $mhs["NIM"] ?></td>
      <td><?= $mhs["name"] ?></td>
      <td><?= $mhs["email"] ?></td>
      <td><?= $mhs["study_program"] ?></td>
      <td>
        <a href="#">Update</a>
        <a href="#">Delete</a>
      </td>

    </tr>
    <?php endwhile; ?>

  </table>
</body>

</html>