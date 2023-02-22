// ambil elemen-elemen yang dibutuhkan

var keyword = document.getElementById("keyword");
var tombolCari = document.getElementById("tombol-cari");
var container = document.getElementById("container");

// tambahkan event ketika keyword ditulis

keyword.addEventListener("keyup", function () {
  // Membuat object ajax

  var ajax = new XMLHttpRequest();

  // Cek kesiapan ajax
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      container.innerHTML = ajax.responseText;
    }
  };

  // eksekusi ajax
  ajax.open("GET", "ajax/mahasiswa.php?keyword=" + keyword.value, true);
  ajax.send();
});
