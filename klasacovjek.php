<?php

echo "Klase i objekti<br>";

class covjek{
	// var $ime="moje defaoultno ime";
    var $ime;

    function __construct($novoime){
    	$this->ime=$novoime;
    }

	function set_ime($ime){
		$this->ime=$ime;
	}
	function get_ime(){
		return $this->ime;
	}
	function __destruct(){
	//	 echo "<br>nema više objekta zvanog ".$this->ime;
	}


}

$c1=new covjek('Ivica');

$c1->set_ime("Marko");
echo "<br>Moje ime je ".$c1->get_ime();

$c1->set_ime("Dalibor");
echo "<br>Moje ime je ".$c1->get_ime();



$c2=new covjek('Ljilja');
echo "<br>c2 se zove: ".$c2->get_ime();

//$c1=NULL;  // ubijamo $c1
unset($c1);

$c3=new covjek('Marijan');
echo "<br>c2 se zove: ".$c3->get_ime();

//////////KLASA KUPAC///////////////
class kupac extends covjek implements Ikupac{
var $id_kupca;
var $potroseni_iznos;

function __construct($novo_ime){
  parent::__construct($novo_ime);
  $this->id_kupca=1234;
}
function ispis(){

	echo "<br>+++++ ".$this->ime." ima id:".$this->id_kupca." a potrosio je:".$this->potroseni_iznos;

}
}

$k1=new kupac('Ivan');
//
// Ispisi ime, ID, te potrošeni iznos
//
$k1->ispis();
$k1->potroseni_iznos=999.99;
$k1->ispis();

echo "<br>---- ime kupca je ".$k1->ime;

interface Ikupac{
	function ispis();
}



?>