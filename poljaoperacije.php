<?php

$fruits = array(0=> 'limun', 
	            'a'=> 'naranca', 
	             1 => 'banana',
	            'b'=> 'jabuka',
	            7 => 'banana',
	            2=>'grejp' );


$brojelemenata=0;

foreach ($fruits as $key => $value) {
	$brojelemenata++;
}

print_r($fruits);
echo "<br>broj elemenata u polju je $brojelemenata";

echo count($fruits);


$brojelemenata=0;
foreach ($fruits as $key => $value) {
	$brojelemenata++;
if($brojelemenata==3){break;}
}

echo "<br>treće polje sa ključem $key ima vrijednost: ".$value;

echo "<br>zadnji element polja je ".end($fruits);


/// Pretraživanje polja

foreach ($fruits as $kljuc => $vrijednost) {
	if($vrijednost=='banana'){
		break;
	}
}
echo "<br>banana se nalazi pod ključem ".$kljuc;


$key=array_search('banana', $fruits);
echo "Našao sam bananu:".$key;

unset($fruits[$key]);

$key=array_search('banana', $fruits);
echo "Našao sam bananu:".$key;

if(in_array('banana', $fruits)){

	echo "banana je nadjena!";
}

unset($fruits[7]);  // izbacimo element pod kljucem 7

if(in_array('banana', $fruits)){

	echo "banana je nadjena!";
}
else{ 
	echo "nema banane :( ";
}
foreach ($fruits as $value) {
	echo $value;
}






?>