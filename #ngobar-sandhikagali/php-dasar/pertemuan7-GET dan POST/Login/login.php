<?php
// Cek apakaha tombol sumbit sudah ditekan atau belum
if (isset($_POST["sumbit"])) {

  // Cek username dan password
  if ($_POST["username"] == "admin" && $_POST["password"] == "admin") {

    // Jika benar , redirect ke halaman admin
    header("Location:admin.php");
  } else {
    // Jika salah, tampilkan pesan username dan password salah
    $error = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login Admin</title>
</head>

<body>
  <h1>Halaman Login</h1>
  <?php if (isset($error)) : ?>
  <p style="color: red; font-style: italic;">Username dan Passwor Salah</p>
  <?php endif; ?>
  <ul>
    <form action="" method="POST">
      <li>
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
      </li>
      <br>
      <li>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
      </li>
      <br>
      <button type="submit" name="sumbit">Login</button>

    </form>
  </ul>
</body>

</html>