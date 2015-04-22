<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

td:nth-child(even) {background: #FFBFBF}
td:nth-child(odd) {background: #FFF}

	</style>
</head>
<body>

<?php
////// FUNKCIJE

/*
<povratni_tip> <ime_funkcije>([argument1],[argument2]){
<tijelo funkcije>
}
*/
/*
function br(){
	echo "<br>";
}
*/
function br($broj_novih_redova){
	/*
	for($i=0;$i<=$broj_novih_redova;$i++){
		echo "<br>";	
	}*/
	echo str_repeat("<br>",$broj_novih_redova);
}

$timestamp=time();

//echo("ispis vremena $timestamp");

$nizslova="neko južno voće";
$nekiarray= array("plava","zuta","crvena" );

mojispis($nizslova);


br(4);

mojispis($nekiarray);
br(3);
mojispis($nekiarray);
mojispis($nekiarray);
br(1);
mojispis($nekiarray);


function mojispis($ulaz){
if(!is_array($ulaz)){
  echo "<br>".$ulaz;
}
else{
	echo "<pre>";
  print_r($ulaz);
  echo "</pre>";
}
}
$datum= date ( "L", 14589256);

echo $datum;
////////////////


function ispis_tablice($ulaz){

echo "<table border='1'>";
foreach ($ulaz as $key => $value) {
	echo "
		<tr>
           <td>$key</td>
           <td>$value</td>
           <td>Nesto bezvetze</td>
           <td>Nesto bezvetze</td>
           <td>Nesto bezvetze</td>
            <td>Nesto bezvetze</td>          
	     </tr>
        ";
}
echo "</table>";

}



$juznovoce = array('mango','kokos','banana');
ispis_tablice($juznovoce);

br(5);

$fruits = array(0=> 'limun', 
	            'a'=> 'naranca', 
	             1 => 'banana',
	            'b'=> 'jabuka',
	            7 => 'banana',
	            2=>'grejp' );

ispis_tablice($fruits);



///// KRAJ   
br(15);
?>



</body>
</html>