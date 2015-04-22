<?php
include("db_mysqli.php");

function dan($dan){
	switch($dan){
		case 'PO':return "Ponedjeljak"; break;
		case 'UT':return "Utorak"; break;
		case 'SR':return "Srijeda"; break;
		case 'CE':return "Četvrtak"; break;
		case 'PE':return "Petak"; break;
		case 'SU':return "Subota"; break;
		default:return "Nedjelja";
	}
}
function sat($sat){
	return $sat.':00';
}

$Dani = array (
	'PO' => 'Ponedjeljak',
	'UT' => "Utorak",
	'SR' => "Srijeda",
	'CE' => "Četvrtak",
	'PE' => "Petak",
	'SU' => "Subota",
	'NE' => 'Nedjelja'
	);
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Ispis rezervacije za odabranu dvoranu</title>
</head>
<body>
<?php
if(isset($_GET['dvorana'])){
$query=<<<END
SELECT 
rezervacija.oznvrstadan,
rezervacija.sat,
pred.nazpred 
FROM `fakultet`.`rezervacija` INNER JOIN pred 
on rezervacija.sifpred=pred.sifpred 
WHERE ozndvorana LIKE ?;
END;

		if($stmt=$mysqli->prepare($query)){
			$stmt->bind_param('s',$_GET['dvorana']);
			$stmt->execute();
			$stmt->bind_result($oznvrstadan,$sat,$nazpred);
			$stmt->store_result();
			if($stmt->num_rows<1){echo "ne postoji rezervacija za odabranu dvoranu<br/>";}

			while($stmt->fetch()){

 echo $Dani[$oznvrstadan].", ".sat($sat).", <i>".$nazpred."</i><br/>";
				
			} // end while za dvoranu
			$stmt->close();
		} // end if 
	} 
	?>

	<a href='index.php'>vrati se na index...</a>
</body>
</html>