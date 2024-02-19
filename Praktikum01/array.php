<?php
$hewan = ["Kucing", "Kuda", "Kelinci", "Kangguru","Koala", "Keledai"];
echo $hewan[0]. "<br>";
echo $hewan[5]. "<br>";
echo  "<br>";
foreach ($hewan as $key => $value) {
    echo $value . "<br>";
}

$hewan[2] = "Kukang"; // mengganti nilai array
echo $hewan[2];
?>