<?php
// Function menggunakan date untuk menampilkan form tertentu

echo date("l, d-M-Y");

echo ("<br>");

// Function menggunakan time untuk menampilkan waktu tertentu

//untuk menghitung hari dan tanggal hari ke depanya
echo date("l,d-M-Y", time() + 60 * 60 * 24 * 30);

echo ("<br>");

//unutuk menghitung hari dan tanggal ke belakang

echo date("l, d-M-Y", time() - 60 * 60 * 24 * 20);

echo "<br>";

// Function mktime

// Membuat sendiri detik
// mktime(0,0,0,0,0,0,)
//jam,menit,detik,bulan,tanggal,tahun

echo date("l", mktime(0, 0, 0, 7, 8, 2001));

echo ("<br>");

// function strtotime
echo date("l", strtotime("20 Dec 2022"));