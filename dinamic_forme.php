<?php
if(isset($_FILES)){
	echo "<pre>";
print_r($_FILES);
echo "</pre>";
}

///////////////////////

function uploadme($ulazni_file){
$uploadfile=basename($ulazni_file);
$file_array=explode('.', $uploadfile); // želim dohvatiti ekstenziju!
$file_on_server="mojfilie_".time().".".end($file_array);
move_uploaded_file($ulazni_file['tmp_name'], $file_on_server);
}

foreach ($_FILES['datoteka']['name'] as $key => $value) {
	uploadme($value);
}

///////////////////////


?>

<!DOCTYPE html>
<html>
<head>
	<title>forme</title>
</head>
<body>


<form method="post" name="mojaforma" action="" enctype="multipart/form-data">
<?php if(!isset($_POST['brojponavljanja'])){ ?>
Unesi broj fileova koje želiš uploadati:<br>
<input type="text" name="brojponavljanja" />
<?php } ?>


<?php 
if(isset($_POST['brojponavljanja'])){
  for($i=0;$i<$_POST['brojponavljanja'];$i++){
?>
<?php echo "ime".$i;?>:
<input type="file" name="datoteka[]" value=""/><br/>

<?php 
  } // zatvaramo petlju ispisa
}// zatvaramo blok ispitivanja uvijeta
?>


<br>
<input type="submit" name="submit" value="Pošalji datoteke"/>
</body>
</html>