<?php
// include("db_connection.php");
// include_once("db_connection.php");
// require("db_connection.php"); 
require_once("db_connection.php");


echo "<br>Neki ispis sa stranice...<br>lsdfklw<br>";

$result =mysql_query("select * from stud LIMIT 10");
$result2 =mysql_query("select * from stud LIMIT 12");
$result3 =mysql_query("select * from stud LIMIT 12");
$result4 =mysql_query("select * from stud LIMIT 12");

if($result){

	echo "Broj redova affected:".mysql_num_rows($result);
// dohvacanje podataka;

echo "<table><tr><td>";

echo "<ol>";
while($row=mysql_fetch_row($result)){
	echo "<li>".$row[1]." ".$row[2]."</li>";
}
echo "</ol>";

echo "</td><td>";

echo "<ol>";
while($row=mysql_fetch_array($result2)){
	echo "<li>".$row['imeStud']." ".$row[2]."</li>";
}
echo "</ol>";

echo "</td><td>";

echo "<ol>";
while($row=mysql_fetch_row($result3)){
	//echo "broj stupaca: ".count($row);
	//print_r($row);
	echo "<li>";
	foreach ($row as $key => $value) {
		echo " ".$row[$key];
	}
	echo "</li>";
}
echo "</ol>";

echo "</td><td>";


while($row=mysql_fetch_object($result4)){
	echo "<li>";
	echo $row->imeStud;
	echo " ";
	echo $row->prezStud;
	echo "</li>";
}


echo "</td></tr></table>";

}
else{
	echo "neuspješan upit!";
}





?>