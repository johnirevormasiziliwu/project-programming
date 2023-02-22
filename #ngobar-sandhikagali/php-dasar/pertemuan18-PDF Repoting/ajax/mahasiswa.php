<?php
require '../Koneksi/functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM mahasiswa WHERE
name LIKE '%$keyword%' OR 
NIM LIKE '%$keyword%' OR
email LIKE '%$keyword%' OR 
study_program LIKE '%$keyword%' 
";
$students = query($query);



?>

<table border="1" cellpadding="10" cellspacing="0">
  <thead>
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>NIM</th>
      <th>Email</th>
      <th>Study Program</th>
      <th>Image</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php foreach ($students as $student) : ?>
    <tr>
      <td style="text-align: center;"><?= $nomor++ ?></td>
      <td><?= $student["name"] ?></td>
      <td><?= $student["NIM"] ?></td>
      <td><?= $student["email"] ?></td>
      <td><?= $student["study_program"] ?></td>
      <td style="text-align: center;"><img src="/image/<?= $student["image"] ?>" width="100px" height="50px"
          alt="Johni Revormasi Ziliwu"></td>
      <td style="text-align: center;">
        <a href="update.php?id=<?= $student["id"] ?>">Upadate</a> |
        <a href="delete.php?id=<?= $student["id"] ?>" onclick="return confirm('Anda Yakin Hapus Data ini ?')">Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>