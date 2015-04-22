<?php
include("db_mysqli.php");

if (isset($_POST['filterime'])){
$query_tpl = "SELECT imestud, prezstud FROM stud WHERE imestud LIKE ?";

if($stmt=$mysqli->prepare($query_tpl)){
	$stmt->bind_param('s',$_POST['ime']);
	$stmt->bind_result($imes, $prezimes);
	$stmt->execute();
}
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Filter podataka</title>
	<script type="text/javascript">
function submitdropdown(){
//	alert();
document.getElementById('zup').submit();
//document.getElementsByTagName('zup').submit();

}
	</script>

</head>
<body>

<form action="#" method="post">
	unesi ime: 
	<input 
	type="text" 
	name="ime" 
	value="<?php if (isset($_POST['filterime'])){echo $_POST['ime'];}?>">
	<input type="submit" value="Dohvati ime" name="filterime">
</form>
<!--  ISPISUJEMO REZULTATE IMENA -->
<?php
if (isset($_POST['filterime'])){
    while ($stmt->fetch()) {
        printf ("%s (%s)<br>", $imes, $prezimes);
    }
    $stmt->close();
}
?>

<hr/>
<form action="#" method="post" id="zup" name="zup">

<?php
$query = "SELECT sifZupanija, nazZupanija FROM zupanija WHERE sifZupanija != 0";

if($stmt=$mysqli->prepare($query)){
	$stmt->bind_result($sz, $nz);
	$stmt->execute();
echo "<select name='sifz' onchange='submitdropdown(),this.form.submit()'>";
    while ($stmt->fetch()) {
        printf ("<option value='%s'>%s</option>", $sz, $nz);
    }
echo "</select>";
    $stmt->close();
}
?>

	<input type="submit" value="Dohvati zup" name="filterzupanija">
</form>
<!--  ISPISUJEMO REZULTATE Županija -->
<?php
if (isset($_POST['sifz'])){
	$query_tpl = "SELECT nazZupanija FROM zupanija WHERE sifZupanija = ?";
	if($stmt=$mysqli->prepare($query_tpl)){
		$stmt->bind_param('i',$_POST['sifz']);

		$stmt->bind_result($nz);
		$stmt->execute();
		while ($stmt->fetch()) {
			printf ("Odabrana je Županija: <b>%s </b><br>", $nz);
		}
		$stmt->close();
	}
}
?>
<hr>

<!--  ISPISUJEMO REZULTATE MJESTA -->
<form action="#" method="post" id="fmjesto" name="fmjesto">

<?php
if (isset($_POST['sifz'])){
$query = "SELECT pbr, nazmjesto FROM mjesto WHERE sifZupanija = ?";

if($stmt=$mysqli->prepare($query)){
	$stmt->bind_param('i',$_POST['sifz']);
	$stmt->bind_result($sm, $nm);
	$stmt->execute();
echo "<select name='sifm' onchange='this.form.submit()'>";
echo "<option value=''>odaberi grad:</option>";
    while ($stmt->fetch()) {
        printf ("<option value='%s'>%s</option>", $sm, $nm);
    }
echo "</select>";
    $stmt->close();
}
}
?>
</form>
<!--  ISPISUJEMO REZULTATE STUDENTI -->
<hr>

<form action="#" method="post" id="fstud" name="fstud">

<?php
if (isset($_POST['sifm'])){
$query = "SELECT mbrstud,concat(imestud,' ',prezstud) AS istud FROM stud WHERE pbrstan = ?";

if($stmt=$mysqli->prepare($query)){
	$stmt->bind_param('i',$_POST['sifm']);
	$stmt->bind_result($ss, $ns);
	$stmt->execute();
echo "<select name='sifs' onchange='this.form.submit()'>";

    while ($stmt->fetch()) {
        printf ("<option value='%s'>%s</option>", $ss, $ns);
    }
echo "</select>";
    $stmt->close();
}
}
?>
</form>

</body>
</html>
<?php
$mysqli->close();
?>