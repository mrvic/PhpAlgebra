<?php

$a=44;
echo $a;

$a="Neko ime";
echo $a;

$naziv_var='iznos';
$$naziv_var=35;

echo "<br>".$iznos;

$aa='Algebra';
$b=&$aa;

echo $b;
$aa='Neka druga škola';
echo $b;

define('PI',3.14);

echo PI;

if(is_double(PI)){

	echo "<br>PI je double!";
}
else{

	echo "PI nije double?";
}

echo "<br>DVOSTRUKI: Naša škola je $aa";
echo '<br>JEDNOSTRUKI: Naša škola je '.$aa;


// POLJA;
$mojnekiarra = array('kfranic' => 'loz1','mbaric'=>'loz2' );
$mojdrugi=array('loz3','loz4','sdfwsf');

echo "Koja je lozinka od Marka Barića? Lozinka je:".$mojnekiarra['mbaric'];
print_r ($mojnekiarra);
echo "<br>";
print_r($mojdrugi);
echo "Koja je lozinka od Marka Barića? Lozinka je:".$mojdrugi[2];

///
// 1.

$broj1=2;
$broj2=2.4353;
echo $broj1;



?>