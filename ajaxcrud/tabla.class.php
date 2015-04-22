<?php 

/**
*
*  @Poziv: $t3=new tabla("select * from ispit LIMIT 5");
*
*
*/

class tabla{
// prilikom poziva predaje query i šalje na ispis()
function __construct($query){  
	$this->query=$query;
}


function ispis(){

// izvršava upit
$result=mysql_query($this->query);  


// iz upita dohvaća prvi red
$row=mysql_fetch_object($result);

// ispisujemo HTML tablicu 
	echo '<table>
		<tr>';

/* Ispisujemo samo PRVI red i to key jer nam je potreban zbog headera
*
*            $key[0]   => $value[0]
*  Array (   [imeStud] => Darko       [prezStud] => Cindrić [god] => 1984 [mjesec] => 10 ) 
*
*/

foreach ((array)$row as $key => $value) {
	echo "<td>".$key."</td>";
}
	echo '</tr>';

// Ponovo pokrećemo fetch jer smo izgubili prvi red podataka ispisom headera

mysql_data_seek($result, 0); 

// petlja za redove:
	while($row=mysql_fetch_object($result)){
		echo '<tr>';

		// Petlja za fieldove
		foreach ((array)$row as $key => $value) {
			echo "<td>".$value."</td>";
		}
		echo '</tr>';
	}
	echo '</table>';

} // function ispis() end
function ispis2(){

// izvršava upit
$result=mysql_query($this->query);  

// ispisujemo HTML tablicu 
	echo '<table>';

$run_once=true;
// petlja za redove:
	while($row=mysql_fetch_object($result)){

		// petlja za headere:
		while($run_once==true){
			echo	'<tr>';
			foreach ((array)$row as $key => $value) {
				echo "<td>".$key."</td>";
			}
			echo '</tr>';
			$run_once=false;
		}	
		

		echo '<tr>';
		// Petlja za fieldove:
		foreach ((array)$row as $key => $value) {
			echo "<td>".$value."</td>";
		}
		echo '</tr>';
	}
	echo '</table>';

} // function ispis() end
function ispis3(){

// izvršava upit
$result=mysql_query($this->query);  

// ispisujemo HTML tablicu 
	echo '<table>';

$run_once=true;
// petlja za redove:
	while($row=mysql_fetch_object($result)){

		// petlja za headere:
		while($run_once==true){
			echo	'<tr>';
			foreach ((array)$row as $key => $value) {
				echo "<td>".$key."</td>";
			}
			echo '</tr>';
			$run_once=false;
		}	
		

		echo '<tr>';
		// Petlja za fieldove:
		foreach ((array)$row as $key => $value) {
			echo "<td>".$value."</td>";
		}
		echo "<td><input type='button' name='uredi' value='Uredi' onclick='edit(".$row->mbrStud.")'></td>";
		echo '</tr>';
	}
	echo '</table>';

} // function ispis3() end
} // class end
?>