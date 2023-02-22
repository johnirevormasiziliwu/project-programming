<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>latiah Pengirim Menggunakan POST</title>
</head>

<?php if (isset($_POST["sumbit"])) : ?>
<h1>Selamat Datang, <?= $_POST["nama"]; ?></h1>
<?php endif; ?>


<body>
  <form action="" method="POST">
    Masukan Nama Anda : <input type="text" name="nama">
    <br>
    <button type="submit" name="sumbit">Kirim!</button>
  </form>
</body>

</html>