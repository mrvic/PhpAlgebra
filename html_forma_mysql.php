<?php
require('db_mysqli.php');
if(isset($_POST['post_br'])){

	//$query="INSERT INTO `fakultet`.`mjesto` (`pbr`, `nazMjesto`, `sifZupanija`) VALUES (99999, 'PROBA', 12)";
	$query="INSERT INTO `fakultet`.`mjesto` (`pbr`, `nazMjesto`, `sifZupanija`) VALUES (?, ?, ?)";

	if ($stmt=$mysqli->prepare($query)){
	$stmt->bind_param('isi',$_POST['post_br'], $_POST['naziv'],$_POST['sifra_zupanije']);
$stmt->execute();
	echo "Uspjesno unesen ".$mysqli->affected_rows." red <br/>";
	$stmt->close();
}
	
	

if($result=$mysqli->query("SELECT * FROM `fakultet`.`mjesto` ORDER BY vrijemeunosa DESC LIMIT 1")){
	while ($row=$result->fetch_assoc()) {
		echo $row["pbr"]." ".$row["nazMjesto"]." ".$row["sifZupanija"]." ".$row["vrijemeunosa"];
		echo "<br/>";
	}
}


}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="POST" action="html_forma_mysql.php">
	Poštanski broj:<br/><input type="text" name="post_br" value=""><br/>
	Naziv:<br/><input type="text" name="naziv" value=""><br/>
		Šifra županije:<br/><input type="text" name="sifra_zupanije" value=""><br/>
	<input type="submit" name="btn_unos" value="Spremi">
</form>

</body>
</html>
