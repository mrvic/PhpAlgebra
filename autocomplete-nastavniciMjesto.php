<?php
function ispis()
{
	include_once ("db_mysqli.php");
	$query_tpl="
	SELECT 
	nastavnik.prezNastavnik, 
	nastavnik.imeNastavnik, 
	nastavnik.koef,
	mjesto.nazMjesto 
	FROM nastavnik join mjesto 
	ON nastavnik.pbrStan=mjesto.pbr WHERE mjesto.nazMjesto= ?
	ORDER BY nastavnik.koef
	LIMIT 20
	";

	if ($stmt=$mysqli->prepare($query_tpl)) {
		$stmt->bind_param("s", $_POST["mjesto"]);
		$stmt->execute();
		$stmt->bind_result($prez, $ime,$koef,$mjesto);
		$stmt->store_result();
		if($stmt->num_rows<1){
			echo "Niti jedan profesor nije iz ".$_POST["mjesto"];
		} else {
			while($stmt->fetch()){
				echo '{ label:"'.$prez.' '.$ime.'", y: '.$koef.' },';
			} // end while
		} //end if-else
	}// end if 
} // end ispis()

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript" src="./script/canvasjs.min.js"></script>
 <script type="text/javascript">
  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {
      theme: "theme2",
      title:{
        text: "Koeficijenti po nastavniku"
      },
      animationEnabled: true,
      axisX: {
        valueFormatString: "MMM",
        interval:1,
        intervalType: "month",
        labelAngle: 30
        
      },
      axisY:{
        includeZero: false
        
      },
      data: [
      {        
        type: "bar",     
        dataPoints: [
<?php
ispis();
?>

        ]
      }
      
      
      ]
    });

chart.render();
}
//////////////




</script>
</head>
<body>
<table>
	<tr>
		<td>

<?php

include ("db_mysqli.php");

//echo $_POST["mjesto"];

$query_tpl="
SELECT 
nastavnik.prezNastavnik, 
nastavnik.imeNastavnik, 
nastavnik.koef,
mjesto.nazMjesto 
FROM nastavnik join mjesto 
ON nastavnik.pbrStan=mjesto.pbr WHERE mjesto.nazMjesto= ?";

if ($stmt=$mysqli->prepare($query_tpl)) {
	$stmt->bind_param("s", $_POST["mjesto"]);
	$stmt->execute();
	$stmt->bind_result($prez, $ime,$koef,$mjesto);
	$stmt->store_result();
	if($stmt->num_rows<1){
		echo "Niti jedan profesor nije iz ".$_POST["mjesto"];
	} else {
	echo '<table border=1>
	<th>Prezime</th><th>Ime</th>';
	while($stmt->fetch()){
	printf("<tr title='%s, koef:%s'><td>%s</td><td>%s</td><tr>",$mjesto,$koef,$prez, $ime);
	//echo "<tr title=''><td>".$prez."</td><td>".$ime."</td><tr>";
	}
	echo '</table>';
	}
}
?>
</td><td valign="top" width="80%">
	GRAF<br/>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>


</td>
	</tr>
</table>

<script>
  $( document ).tooltip();
</script>
</body>
</html>
<?php
$stmt->close();
$mysqli->close();
?>