


<!DOCTYPE html>
<html>
<head>
	<title>Naš naslov</title>
</head>
<body>
<?php
echo $_SERVER['REMOTE_ADDR'];
?>
<form method="POST" action="formica.php?nadimak=Predrag3">

Upisi ime: <input type="text" name="ime" value="<?php 
if(isset($_REQUEST['ime'])){
echo $_REQUEST['ime']; }?>"/><br>
Upisi Prezime:<input type="text" name="prezime" value="<?php 
if(isset($_REQUEST['prezime'])){
echo $_REQUEST['prezime']; }?>"/><br/>

Spol:
<input type="radio" name="spol" value="M" checked="true">muško
<input type="radio" name="spol" value="Ž"/>žensko
<br>

Županija

<select>
	<optgroup>
		<option value="1">Osijek</option>
		<option value="2">Đakovo</option>		
	</optgroup>
		<option value="3">Čepin</option>
		<option value="99">Zagreb</option>	
</select>

interesi:
<input type="checkbox" value="1" name="interesi"/>sport
<input type="checkbox" value="1" name="interesi"/>muzika
<input type="checkbox" value="1" name="interesi"/>racunala
<br>
<textarea name="napomena" rows="5"><?php 
if(isset($_REQUEST['napomena'])){
echo $_REQUEST['napomena']; }?></textarea><br>

<input type="submit" name="btn_sumnit" value="obrada">
</form>



<br/>
<b>Podaci iz forme su:
<pre>
 <?php 
echo "<br>post: ";
 print_r($_POST);
 echo "<br>get: "; 
print_r($_GET); 
 echo "<br>request: "; 
print_r($_REQUEST); 





 ?></b>
</pre>
<br/>















ovo je tijelo HTML-a
<?php echo "ovo je malo dinamičnog ispisa";?>
<br>

<?php $i=0; do{  ?>
<img src="Koala.jpg" width="50px">

<?php $i++; } while($i<12) ?>

</body>
</html>
