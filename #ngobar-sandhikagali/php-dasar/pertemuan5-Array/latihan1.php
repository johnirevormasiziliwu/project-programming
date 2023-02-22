<?php

// Array

//  variabel yang dapat memiliki banyak nilai 

// elemen pada arra boleh memiliki banyak tipe data yang berbeda 

// pasangan antara key dan value

// ke-nya adalah index, yang dimulai dari 0

//  2 cara membuat array

// cara lama

$hari = array("Senin", "Selasa", "Rabu");



echo "<br>";

// cara baru 

$bulan = ["Januari", "Febuari", "Maret"];

// Menampilkan array 

// Menggunakan var_dump
var_dump($hari);

echo "<br>";

// Menggunakan print_r
print_r($bulan);

// Menampilkan 1 elemen pada array 
echo "<br>";
echo $bulan[1];
echo "<br>";
echo $hari[0];

echo "<br>";

// Menambahkan elemen baru pada array

var_dump($hari);
$hari[] = "Kamis";
$hari[] = "Juma'at";
var_dump($hari);