<?php

//$naziv="Vienna";  //Vienna ili Wien  
$naziv="Wien";  //Vienna ili Wien  

switch($naziv){

	case 'Rim': echo "grad je rim"; break;
   
    case 'Wien':
    case 'Wien1':
    case 'Wien2': //   echo "grad je Beč"; break;
	case 'Vienna':  echo "grad je Beč"; break;


	default: echo "grad je nepoznat?";
}


?>