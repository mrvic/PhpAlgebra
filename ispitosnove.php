<?php
include "data.php";



class tabla{
var $brojac=0;	// služi nam za dinamičko numeriranje redova u tablici
var $imena;		// array sa imenima oblika ['Ime1 Prezime1','Ime2 Prezime2'...]
var $left=0;    // pozicija X "<div>" layera
var $top=0;		// pozicija Y "<div>" layera
var $position="relative;";    // default 'relative'. ukoliko zadamo $top i $left moramo promjeniti u 'absolute'


function __construct($ulaznaimena){  
	$this->imena=$ulaznaimena;
}

// postavljamo layer u kojemu je tablica u neku točku
function pozicija($left,$top){
	$this->left=$left;
	$this->top=$top;
	$this->position='absolute;';
}

// upisujemo CSS koordinate u "style" atribut <div> layera
function poz(){
	return "left:".$this->left.";top:".$this->top;
}

function date_trans($stari_datum){
return date("d.m.Y",strtotime($stari_datum));
}
function date_trans_exp($stari_datum){
	$a=explode("-",$stari_datum); // "2011-03-15" -> "15.03.2011"
return $a[2].".".$a[1].".".$a[0].".";
}

function ispis(){
	echo '
	<div class="CSSTableGenerator"
	onMouseOver="this.style.zIndex = 10" 
	onMouseOut="this.style.zIndex = 1"
	style="width:450px;position:'.$this->position.''.$this->poz().'">
	<table border=1>';

// Ispisujem table header
    echo "<tr><td>ID</td>";
	foreach ($this->imena[1] as $key => $value) {
		 echo "<td>".$key."</td>";
      }	
    echo "</tr>";   

// Ispisujemo redove
	foreach ($this->imena as $key => $value) {
		echo "<tr><td>".$key."</td>";
      foreach ($value as $key1 => $value1) {
      	// Ispitujem dali je polje "placeno"
      	if($key1=="placeno"){
      		echo "<td><select>";
      		echo "<option selected>".$value1."</option>";
      		if($value1=='Da'){
           echo "<option>Ne</option>";
      		}
      		else{
      	 echo "<option>Da</option>";
      }
       
       echo "<select></td>";
      	}
      	// Ispitujem dali je ovo polje "datum"
      	else if($key1=="datum"){
      		echo "<td><b>".$this->date_trans_exp($value1)."</b></td>";
      }
      else {
      		echo "<td>".$value1."</td>";
      }
	    
      }	
      echo "</tr>";
    }

echo '</table ></div>';
	}
}


?>


<!-- Počinjemo s formiranjem HTML dokumenta  -->
<!-- casd-->



<html>

<head>
	<!-- Bring to you by http://www.CSSTableGenerator.com -->
	<link rel="stylesheet" href="table.css" type="text/css"/>	<!-- Malo css šminke  -->
</head>

<body>

	<?php 
	$t1=new tabla($data);
	$t1->ispis();
	?>

</body>
</html>
