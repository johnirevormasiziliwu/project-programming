<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'Koneksi/functions.php';
$students = query("SELECT * FROM mahasiswa");


$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
</head>
<body>
  <h1 style="text-align:center; text-decoration:underline;">Data Mahasiswa</h1>
  <table border="1" cellpadding="10" cellspacing="0">
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>NIM</th>
            <th>Email</th>
            <th>Study Program</th>
          </tr>';
$no = 1;
foreach ($students as $student) {
  $html .= '<tr>
        <td>' . $no++ . '</td>
        <td>' . $student["name"] . '</td>
        <td>' . $student["NIM"] . '</td>
        <td>' . $student["email"] . '</td>
        <td>' . $student["study_program"] . '</td>
</tr>';
}

$html .= '</table>
</body>

</html>';


$mpdf->WriteHTML($html);
$mpdf->Output();