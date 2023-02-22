<?php

require 'Koneksi/functions.php';

if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  //cek username 
  if (mysqli_num_rows($result) === 1) {

    // cek password 
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      header("Location: index.php");
      exit;
    }
  }

  $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login</title>
</head>

<body>
  <h1>Halaman Login</h1>

  <?php if (isset($error)) : ?>
  <p style="color: red; font-style:italic;">Username dan Password Salah</p>
  <?php endif; ?>

  <form action="" method="POST">
    <label for="username">Username</label> <br>
    <input type="text" name="username" id="username"> <br>
    <label for="password">Password</label> <br>
    <input type="password" name="password" id="password"> <br>

    <br>
    <button type="submit" name="login">Login !</button>
  </form>
</body>

</html>