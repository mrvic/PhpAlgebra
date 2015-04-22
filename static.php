<?php

class mojaklasa{
public static $mojavarijabla="neka boja žuta";
static function debeliispis($var){
	echo "<b>".$var."</b>";
}
}

echo "static primjer<br>";

// $obj1=new mojaklasa();
//echo $obj1->mojavarijabla;

echo mojaklasa::$mojavarijabla;
mojaklasa::debeliispis(" ovo boldaj");



?>