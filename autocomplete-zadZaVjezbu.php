<?php 

include ("db_mysqli.php");

//$query="SELECT nazMjesto FROM mjesto";
$query = "SELECT DISTINCT nazMjesto FROM nastavnik left join mjesto ON nastavnik.pbrStan=mjesto.pbr";

if($stmt=$mysqli->prepare($query)){
	$stmt->execute();
	$stmt->bind_result($nazMjest);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Popis nastavnika po mjestu stanovanja</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    var availableTags = [
	<?php 
	while($stmt->fetch()){
		printf('"%s", ',$nazMjest);
	} echo '""';
	$stmt->close();
}
$mysqli->close(); ?>
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  });
  </script>
</head>
<body>
<form method="POST" action="autocomplete-nastavniciMjesto.php"> 
<div class="ui-widget">
  <label for="tags">Mjesto: </label>
  <input id="tags" name="mjesto">
  <input type="submit" name="btn_submit" value="Pretrazi">
</div>
</form>
 
</body>
</html>


<!--
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="">
Unesite naziv mjesta:<br>
<input type="text" name="mjesto" value="">
<input type="submit" name="btn_submit" value="Trazi!">
</form>


</body>
</html>
-->