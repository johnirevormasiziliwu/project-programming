<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "php_dasar");

// Functions 

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  global $conn;
  $name = htmlspecialchars($data["name"]);
  $NIM = htmlspecialchars($data["NIM"]);
  $email = htmlspecialchars($data["email"]);
  $study_program = htmlspecialchars($data["study_program"]);

  // Upload gambar 
  $image = upload();
  if (!$image) {
    return false;
  }

  $query = "INSERT INTO mahasiswa 
            VALUES 
            ('','$name','$NIM','$email','$study_program','$image')
            
            ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function upload()
{
  $namaFile = $_FILES['image']['name'];
  $ukuranFile = $_FILES['image']['size'];
  $error = $_FILES['image']['error'];
  $tmpName = $_FILES['image']['tmp_name'];

  // cek apakah tidak ada gambar yang di upload 
  if ($error === 4) {
    echo "<script>
          alert('pilih gambar terlebih dahulu');
         </script>";
    return false;
  }

  // cek apakah yang di upload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "<script>
    alert('Yang anda upload bukan gambar');
   </script>";
    return false;
  }

  // cek jika ukuran nya terlalu besar
  if ($ukuranFile > 1000000) {
    echo "<script>
    alert('Ukuran gambar terlalu besar');
   </script>";
    return false;
  }

  // lolos pengecekan, gambar siap diupload
  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;


  move_uploaded_file($tmpName, 'image/' . $namaFileBaru);
  return $namaFileBaru;
}

function hapus($id)
{
  global $conn;
  $query = "DELETE FROM mahasiswa WHERE id = $id";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  global $conn;
  $id = $data["id"];
  $name = htmlspecialchars($data["name"]);
  $NIM = htmlspecialchars($data["NIM"]);
  $email = htmlspecialchars($data["email"]);
  $study_program = htmlspecialchars($data["study_program"]);
  $gambarLama = htmlspecialchars($data["gambarLama"]);

  // cek apakah user pilih gambar baru atau tidak
  if ($_FILES['image']['error'] === 4) {
    $image = $gambarLama;
  } else {
    $image = upload();
  }

  $query = "UPDATE mahasiswa SET
            name = '$name',
            NIM = '$NIM',
            email = '$email',
            study_program = '$study_program',
            image = '$image'
           WHERE  id = $id
          ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $query = "SELECT * FROM mahasiswa WHERE
            name LIKE '%$keyword%' OR 
            NIM LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR 
            study_program LIKE '%$keyword%' 
            ";
  return query($query);
}