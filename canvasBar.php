<?php 

include ("db_mysqli.php");

if(!isset($_GET['pbr'])){
	$_GET['pbr']=21000;
}

$query = "SELECT CONCAT(nastavnik.prezNastavnik,' ', nastavnik.imeNastavnik) AS naziv, nastavnik.koef, nastavnik.id FROM nastavnik WHERE pbrstan=? LIMIT 20 ";

if($stmt=$mysqli->prepare($query)){
	$stmt->bind_param("i",$_GET['pbr']);
	$stmt->execute();
	$stmt->bind_result($naziv, $koef,$nastavnikid);
?>
<!--	while($stmt->fetch()){
		printf('{y: %s, label: "%s"  },' ,$koef, $naziv);
	}
	$stmt->close();
}
$mysqli->close();
?>
-->
<!DOCTYPE HTML>
<html>

<head>  
	<script type="text/javascript">
	window.onload = function () {
		var chart = new CanvasJS.Chart("chartContainer", {

			title:{
				text:"Nastavnici i njihovi koeficijenti"				

			},
                        animationEnabled: true,
			axisX:{
				interval: 1,
				gridThickness: 0,
				labelFontSize: 10,
				labelFontStyle: "normal",
				labelFontWeight: "normal",
				labelFontFamily: "Lucida Sans Unicode",
				labelAngle: 30

			},
			axisY2:{
				interlacedColor: "rgba(1,77,101,.2)",
				gridColor: "rgba(1,77,101,.1)"

			},

			data: [
			{    
            	type: "line",
                name: "companies",
				axisYType: "secondary",
				color: "#014D65",				
				dataPoints: [
				<?php
					while($stmt->fetch()){
		printf('{y: %s, label: "%s",click: function(e){window.location="page2.php?nastavnikid=%s"}  },' ,$koef, $naziv,$nastavnikid);
	}
	$stmt->close();
}
$mysqli->close();
?>

				]
			}
			
			]
		});

chart.render();
}
</script>
<script type="text/javascript" src="canvasjs.min.js"></script>
</head>
<body>
	<div id="chartContainer" style="height: 300px; width: 100%;">
	</div>
</body>
</html>