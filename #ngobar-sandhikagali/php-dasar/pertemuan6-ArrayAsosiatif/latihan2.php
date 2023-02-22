<?php
$mahasiswa = [
  ["Johni Revormasi Ziliwu", "2042101819", "Teknik Informatika", "johnirevormasiz@gmail.com", "johni.jpg"],
  ["David Kristian Ziliwu", "2042101820", "Teologia Kristen", "davidkristian@gmail.com", "johni3.jpeg"]
];

$students = [
  [
    "nama" => "Rickyi Martin Ziliwu",
    "nim" => "2042101821",
    "jurusan" => "Teknik Sipil",
    "email" => "rickyimartin@gmail.com",
    "gambar" => "johni.jpg"

  ],
  [
    "nama" => "Agnes Annatasya Putri Ziliwu",
    "nim" => "2042101822",
    "jurusan" => "Kodokteran",
    "email" => "agnesannatasya@gmail.com",
    "gambar" => "johni2.jpeg"

  ]
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <h1>Daftar Mahasiswa</h1>
  <?php foreach ($mahasiswa as $mhs) : ?>
  <ul>
    <li><img src="img/<?= $mhs[4] ?>" alt=""></li>
    <li>Nama : <?= $mhs[0] ?></li>
    <li>NIM : <?= $mhs[1] ?></li>
    <li>Jurusan : <?= $mhs[2] ?></li>
    <li>Email : <?= $mhs[3] ?></li>

  </ul>
  <?php endforeach; ?>

  <?php echo "<br>"; ?>

  <h1>Daftar Dosen</h1>
  <?php foreach ($students as $student) : ?>
  <ul>
    <li><img src="img/<?= $student["gambar"] ?>" alt=""></li>
    <li><?= $student["nama"] ?></li>
    <li><?= $student["nim"] ?></li>
    <li><?= $student["jurusan"] ?></li>
    <li><?= $student["email"] ?></li>

  </ul>
  <?php endforeach; ?>

</body>

</html>