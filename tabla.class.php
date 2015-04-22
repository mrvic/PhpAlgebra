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
	$this->ispis();
}


function ispis(){

// izvršava upit
$result=mysql_query($this->query);  


// iz upita dohvaća prvi red
$row=mysql_fetch_object($result);

// ispisujemo HTML tablicu 
	echo '<table id="myTable" class="display">
	 <thead>
		<tr>';

/* Ispisujemo samo PRVI red i to key jer nam je potreban zbog headera
*
*            $key[0]   => $value[0]
*  Array (   [imeStud] => Darko       [prezStud] => Cindrić [god] => 1984 [mjesec] => 10 ) 
*
*/

foreach ((array)$row as $key => $value) {
	echo "<th>".$key."</th>";
}
	echo '</tr> </thead><tbody>';

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
	echo '</tbody><tfoot></tfoot></table>';

} // function ispis() end
} // class end
?>