<?php
require_once("db_connection.php");
require("tabla.class.php");

echo "<h3>Dinamičko kreiranje html tablice</h3>";

?>


<!-- Počinjemo s formiranjem HTML dokumenta  -->
<html>

<head>
	<!-- Bring to you by http://www.CSSTableGenerator.com -->
	<link rel="stylesheet" href="table.css" type="text/css"/>
    <link rel="stylesheet" href="divovi.css" type="text/css"/>
	<style type="text/css">
	body {
	background-color: #CC3;
}
    </style>	
	<!-- Malo css šminke  -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<div id="mojokvir"class="CSSTableGenerator">
		<?php 
	$t3=new tabla("select * from ispit LIMIT 5");
	?>

</div>

	<div class="CSSTableGenerator" 
	onMouseOver="this.style.zIndex = 10" 
	onMouseOut="this.style.zIndex = 1"
	style="width: 300px; position: absolute; height: 185px; top: -29px; background-color: #CCC; left: 2px;">
	<?php 
	$t1=new tabla("select * from stud LIMIT 12");
	?>
</div>

	<div class="CSSTableGenerator" 
	onMouseOver="this.style.zIndex = 10" 
	onMouseOut="this.style.zIndex = 1"
	style="width: 339px; position: absolute; height: 208px; left: 246px; top: 108px; background-color: #F9F;">

<?php 
    $studenti_iz_84_85="
select 
stud.imeStud AS 'Ime studenta', 
stud.prezStud AS 'Prezime studenta', 
year(stud.datRodStud) as 'Godina', 
month(stud.datRodStud) as 'Mjesec' 
from fakultet.stud
group by mbrStud
having Godina = 1984 and Mjesec in (10,11,12) 
OR Godina= 1985 and Mjesec in (1,2) 
ORDER BY Godina,Mjesec 

    ";
	$t2=new tabla($studenti_iz_84_85);
	?>
	</div>

</body>
</html>