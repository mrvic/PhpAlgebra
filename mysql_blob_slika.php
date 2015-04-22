<?php

$mysqli= new mysqli('127.0.0.1','root','','test');

if(mysqli_connect_errno()){
	echo "Pogreška";
	echo mysqli_connect_error();
	exit;
}


$tmp_image="koalasm.jpg";
$query = "SELECT * FROM slika";

$result=$mysqli->query($query)

	while ($row=$result->fetch_assoc()) {
		echo $row["ime"];
		echo "<img href>";
	}

$image = mysql_query("SELECT * FROM store WHERE id=$id");
$image = mysql_fetch_assoc($image);
$image = $image['image'];

header("Content-type: image/jpeg");

echo $image;

?>
<a href="mysql_blob_slika.php">ispisi sliku<a>