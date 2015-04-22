<?php

$mysqli= new mysqli('127.0.0.1','root','','test');

if(mysqli_connect_errno()){
	echo "Pogreška";
	echo mysqli_connect_error();
	exit;
}


$tmp_image="koalasm.jpg";
$query = "INSERT INTO slika (ime,file) VALUES  ('test slika','file_get_contents($tmp_image)')";

if($result=$mysqli->query($query)){ echo "Uspjesno sam ubacio file u bazu!";}

?>