<?php
// Variabel $_Get
$students = [
  [
    "nama" => "Johni Revormasi Ziliwu",
    "NIM" => "2042101819",
    "jurusan" => "Teknik Informatika",
    "email" => "johnirevormasiz@gmail.com"
  ],
  [
    "nama" => "David Kristian Ziliwu",
    "NIM" => "2042101820",
    "jurusan" => "Teologia Kristen",
    "email" => "davidkristian@gmail.com"
  ],
  [
    "nama" => "Rickyi Martin Ziliwu",
    "NIM" => "2042101821",
    "jurusan" => "Teknik Sipil",
    "email" => "rickyimartin@gmail.com"
  ]
];

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latihan menggunakan GET</title>
</head>

<body>
  <h1>Data Mahasiswa</h1>
  <ul>
    <?php foreach ($students as $student) : ?>
    <li>
      <a
        href="latihan2GET.php?nama=<?= $student["nama"] ?> & NIM=<?= $student["NIM"] ?> & jurusan=<?= $student["jurusan"] ?> & email= <?= $student["email"] ?>"><?= $student["nama"] ?></a>
    </li>
    <?php endforeach; ?>
  </ul>
</body>

</html>