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
  $image = htmlspecialchars($data["image"]);

  $query = "INSERT INTO mahasiswa 
            VALUES 
            ('','$name','$NIM','$email','$study_program','$image')
            
            ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
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
  $image = htmlspecialchars($data["image"]);

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