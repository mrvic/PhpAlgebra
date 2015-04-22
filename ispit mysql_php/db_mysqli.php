<?php
$mysqli= new mysqli('127.0.0.1','root','','fakultet');

if(mysqli_connect_errno()){
	echo "Pogreška";
	echo mysqli_connect_error();
	exit;
}
?>