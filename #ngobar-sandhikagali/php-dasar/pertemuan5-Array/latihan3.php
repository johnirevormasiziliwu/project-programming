<?php

$students = [
  ["Johni Revormasi Ziliwu", "2042101819", "Teknik Informatika", "jrevormasi@gmail.com"],
  ["David Kristian Ziliwu", "2042101820", "Teologi Kristen", "davidkristian@gmail.com"]
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
  <?php foreach ($students as $student) : ?>
  <ul>

    <li><?= $student[0] ?></li>
    <li><?= $student[1] ?></li>
    <li><?= $student[2] ?></li>
    <li><?= $student[3] ?></li>

  </ul>
  <?php endforeach ?>
</body>

</html>