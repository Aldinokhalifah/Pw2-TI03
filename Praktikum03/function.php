<?php
function tambah($nilai1, $nilai2){
    echo $nilai1 + $nilai2;
}

tambah(1, 2);
echo"<br>";

function hitungUmur($thn_lahir, $thn_sekarang = 2024) {
  echo $thn_sekarang - $thn_lahir;
}

hitungUmur(1945)
?>