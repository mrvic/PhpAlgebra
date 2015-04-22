<?php

$pi=3.14;

$cjelobrojnipi= (int)$pi;

echo "varijabla pi je $pi <br>";
echo "cjelobrojna varijabla je $cjelobrojnipi <br>";
echo "ostatak je: ", $pi-$cjelobrojnipi;

echo "<br>";
$a=0;
$a+=5;  // $a=$a+5;
echo $a;

$a-=2;
echo "<br>nakon što sam ju umanjio za 2";
echo "<br>";
echo $a;

$a/=2;  // $a=$a/2;
echo "<br>";
echo (float)$a;

?>