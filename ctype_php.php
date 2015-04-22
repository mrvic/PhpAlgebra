<?php



//echo "Prova  ctype_alnum()";

$a= "test"; // samo slova  TRUE

$e= "slovo 123"; // slova i brojevi + razmak FALSE

$b= '!#$%&fxst'; // specijalni #$%&! FALSE

$c="kijlisdjjksalćkjkdflč";  

$d=12345;

$f='123\"\n\t2d32';

test($a,"a");
test($b,"b");
test($c,"c");
test($d,"d");
test($e,"e");
test($f,"f");


function test($in,$ime){
	if (ctype_alnum($in)){
		echo "string ".$in." se sastoji od alfanumeričkih znakova<br>";
	}
	else{
		echo "string ".$in." ima specijalne znakove<br>";	
	}
	if (ctype_alpha($in)){
		echo "<b>string </b>".$in." se sastoji od alfa znakova<br>";
	}
	else{
		echo "<b>string </b>".$in." ima specijalne non-alfa znakove<br>";	
	}
	if (ctype_digit($in)){
		echo "<i>string </i>".$in." se sastoji od ctype_digit znakova<br>";
	}
	else{
		echo "<i>string </i>".$in." ima specijalne non-ctype_digit znakove<br>";	
	}
	if (is_numeric($in)){
		echo "<u>string </u>".$in." se sastoji od is_numeric znakova<br>";
	}
	else{
		echo "<u>string </u>".$in." ima specijalne non-is_numeric znakove<br>";	
	}
		if (is_string($in)){
		echo "<b><u>string </u></b>".$in." se sastoji od is_string znakova<br>";
	}
	else{
		echo "<b><u>string </u></b>".$in." ima specijalne non-is_string znakove<br>";	
	}

	echo "<hr/>";

}


?>