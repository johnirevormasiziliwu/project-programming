<?php

// Start sessioan 
session_start();

require 'Koneksi/functions.php';

// cek cookiee
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  // ambil username berdasarkan id

  $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");

  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if ($key === hash('sha256', $row['username'])) {
    $_SESSION['login'] = true;
  }
}

// pengecekan isset login
if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}



if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  //cek username 
  if (mysqli_num_rows($result) === 1) {

    // cek password 
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {

      // set session
      $_SESSION["login"] = true;

      // cek remember me
      if (isset($_POST["remember"])) {

        // buat cookie 
        setcookie('id', $row['id'], time() + 60);
        setcookie('key', hash('sha256', $row['username']), time() + 60);
      }


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

    <input type="checkbox" name="remember" id="remember">
    <label for="remember">Remember me</label>


    <br>
    <button type="submit" name="login">Login !</button>
  </form>
</body>

</html>