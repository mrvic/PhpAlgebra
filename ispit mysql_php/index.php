<?php
include("db_mysqli.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Odabir dvorane</title>
</head>
<body>
<?php

$query=<<<END
SELECT ozndvorana FROM dvorana;
END;

if($stmt=$mysqli->prepare($query)){

	$stmt->execute();
	$stmt->bind_result($oznaka_dvorane);
echo "<b>Prvi</b>";
	while($stmt->fetch()){
?>

		<a href="rezervacija.php?dvorana=<?php echo $oznaka_dvorane;?>"><?php echo $oznaka_dvorane;?></a><br/>
<?php
echo "<b>Drugi</b>";
printf("<a href='rezervacija.php?dvorana=%s'>%s</a><br/>",$oznaka_dvorane,$oznaka_dvorane);
echo "<b>Treći</b>";
echo "<a href='rezervacija.php?dvorana=".$oznaka_dvorane."'>".$oznaka_dvorane."</a><br/>";
	} // end while za dvoranu
	$stmt->close();
} // end if 
?>
</body>
</html>