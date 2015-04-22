<?php
if(isset($_GET['ime1'])){
	echo "<pre>";
print_r($_GET);
echo "</pre>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>forme</title>
</head>
<body>


<form method="get" name="mojaforma" action="">
<?php if(!isset($_GET['brojponavljanja'])){ ?>
<input type="text" name="brojponavljanja" />
<?php } ?>


<?php 
if(isset($_GET['brojponavljanja'])){
  for($i=0;$i<$_GET['brojponavljanja'];$i++){
?>
<?php echo "ime".$i;?>:<input type="text" name="<?php echo "ime".$i;?>" value=""/><br/>

<?php 
  } // zatvaramo petlju ispisa
}// zatvaramo blok ispitivanja uvijeta
?>

<?php 

// 3. zadatak: dinamički ispisujemo linkove
echo "<br>dinamički linkovi<br>";
if(isset($_GET['brojponavljanja'])){
echo "<br>odabrali ste broj:<h1>".$_GET['brojponavljanja']."</h1><br>";
}

if(isset($_GET['brojponavljanja'])){
  for($i=0;$i<$_GET['brojponavljanja'];$i++){
?>

<a href="zadaciforme.php?brojponavljanja=<?php echo $i;?>"><?php echo $i;?></a><br/>

<?php 
  } // zatvaramo petlju ispisa
}// zatvaramo blok ispitivanja uvijeta
?>

<input type="submit" name="submit" value="Pošalji imena"/>
</body>
</html>