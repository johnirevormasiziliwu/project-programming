<?php
$angka = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latihan Array</title>
  <style>
  .kotak {
    width: 50px;
    height: 50px;
    text-align: center;
    background-color: burlywood;
    line-height: 50px;
    margin: 3px;
    float: left;
    transition: 1s;
  }

  .kotak:hover {
    transform: rotate(360deg);
    border-radius: 50%;
    background-color: black;
    color: white;

  }

  .clear {
    clear: both;
  }
  </style>
</head>

<body>
  <?php foreach ($angka as $a) : ?>
  <div class="kotak"><?= $a ?></div>
  <?php endforeach; ?>

  <?php
  echo "<br>";
  ?>

  <!-- Mencetak array multidimensi -->

  <?php
  $angka2 = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
  ];
  ?>
  <?php foreach ($angka2 as $a) : ?>
  <?php foreach ($a as $b) : ?>
  <div class="kotak"><?= $b ?></div>
  <?php endforeach ?>
  <div class="clear"></div>
  <?php endforeach ?>
</body>

</html>