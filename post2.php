<?php

session_start();

foreach ($_REQUEST as $key => $value){
  $_SESSION[$key] = $value;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="post3.php" method="post">
Prezime:
<input type="text" name="prezime" value="">
<br>
<input type="submit">
</form>
<br>
<a href="post1.php">ime</a>&nbsp;<a href="post2.php">prezime</a>
</body>
</html>