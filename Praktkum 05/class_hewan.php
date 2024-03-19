<?php
class HewanMamaLia {
    public $warna;
    public $namaHewan;
    public $habitat;

    function makan() {
        return "Mamalia makan";
    }

    function minum() {
        return "Mamalia minum";
    }

    function menyusui() {
        return "Mamalia menyusui";
    }
}

$mamaLia = new HewanMamaLia();
echo $mamaLia->namaHewan = "Lumba-lumba"; 
echo "<br/>";
echo $mamaLia->warna = "Abu-abu"; 
echo "<br/>";
echo $mamaLia->habitat = "Laut"; 
echo "<br/>";
echo $mamaLia->makan(); 
echo "<br/>";
echo $mamaLia->minum();
echo "<br/>";
echo $mamaLia->menyusui();
