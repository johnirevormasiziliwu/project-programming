<?php

require 'Koneksi/functions.php';

if (isset($_POST['register'])) {
  if (registrasi($_POST) > 0) {
    echo "
    <script>
    alert('user baru berhasil ditambahkan');
    </script>";
  } else {
    echo mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Registrasi</title>
</head>

<body>
  <h1>Halaman Registrasi</h1>
  <form action="" method="POST">

    <label for="username">Username</label> <br>
    <input type="text" name="username" id="username"> <br>

    <label for="password">Password</label> <br>
    <input type="password" name="password" id="password"> <br>

    <label for="password2">Confirmasi Password</label><br>
    <input type="password" name="password2" id="password2"> <br>


    <br>

    <button type="submit" name="register">Registrasi!</button>





  </form>
</body>

</html>