<?php
// 21+23+25+27+29

$zbroj=0;
for ($i=20; $i < 30; $i++) { 
	
	if($i%2==0){
		continue;
		//break;
	}
	$zbroj+=$i;
	Echo "<br>i:$i";

}

Echo "<br>zbroj bi trebao biti ", 21+23+25+27+29;
echo "<br>Zbroj je ".$zbroj;



?>