<?php

session_start(); 

foreach ($_SESSION as $key => $value){
  $_POST[$key] = $value;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<b>
Ime=<?php echo $_POST['ime']; ?>
<br>
Prezime=<?php echo $_POST['prezime']; ?>
</b>
<br>
<a href="post1.php">ime</a>&nbsp;<a href="post2.php">prezime</a>
</body>
</html>