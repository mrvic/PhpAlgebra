<?php

$polja = array('xyz','1'=>'Tesla','2'=>'Edison' );

//echo $polja[1];

//// ispis pomoću for petlje

for($i=0;$i<=2;$i++){
	echo " ".$polja[$i];
}


// ovdje ne moram znati broj polja niti početni index
foreach ($polja as $value) {
	echo " ".$value;
	echo "-*-*-*-*-*-*-*-*-*-*-*-*";
}

//
echo "<br>polje1:<br>";
$polje1=array('Tesla','ime'=>'Edison','Bell');
foreach ($polje1 as $value) {
	echo " ".$value;
}
echo "<br>polje1 pomoću print_r():<br>";
echo "<pre>";
print_r($polje1);
echo "</pre>";
//echo " ".$polje1['ime'];


//// ispis pomoću for petlje
$polje2=array('Tesla','Edison','Bell');
echo "<br>ispis pomoću count():<br>";

echo "ukupan broj elemenata arraya polje2 je:<b>".count($polje2)."</b><br>";

for($i=0;$i<count($polje2);$i++){
	echo " ".$polje2[$i];
}

//// ispis pomoću foreach uz key=>value
echo "<br><hr>ispis pomoću foreach uz key=>value:<br>";
foreach ($polje2 as $key => $value) {
	echo "moj ključ \"$key\" daje vrijednost $value<br>";
}

echo "<pre>";echo "</pre>";
foreach ($polje2 as $key => $value) {
	echo "moj ključ \n\t\t$key \t $value\n";
}

?>