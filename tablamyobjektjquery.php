<?php
require_once("db_connection.php");
require("tabla.class.php");

echo "<h3>jQuery tablica</h3>";

?>


<!-- Počinjemo s formiranjem HTML dokumenta  -->
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.min.css">




<script type="text/javascript">
$(document).ready(function(){

    $('#myTable').DataTable();

});	

</script>


</head>

<body>


	
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
	

</body>
</html>