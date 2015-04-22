
<?php

//echo "".$_GET['id'];
// UPDATE `fakultet`.`stud` SET `imeStud`='Matko' WHERE  `mbrStud`=1131;

?>
<script type="text/javascript">
	function unesinovoime(){
alert("dohvat varijable?");

	}

</script>
<form method="POST" action="html_forma_mysql.php">
<input type="hidden" value="<?php echo $_GET['id'];?>">

	Ime:<br/><input id="ime" type="text" name="naziv" value=""><br/>
	
	<input type="button" name="btn_unos" value="Spremi" onclick="unesinovoime()">
</form>
