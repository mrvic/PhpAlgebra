
<?php 
echo "<pre>";
print_r($_FILES);
echo "</pre>";

$uploaddir='/doc';

$uploadfile=basename($_FILES['datoteka']['name']);

echo $uploadfile;   // vraća npr "Autoconfig.ini"

$file_array=explode('.', $uploadfile); // želim dohvatiti ekstenziju!

echo "<br>ovo je moj \$file_array <br>";

echo "<pre>";
print_r($file_array);
echo "</pre>";

$file_on_server="mojfilie_".time().".".end($file_array);

echo $file_on_server;

move_uploaded_file($_FILES['datoteka']['tmp_name'], $file_on_server);


?>


<!DOCTYPE html>
<html>
<head>
	<title>Neki upload</title>
</head>
<body>

<!-- Ovdje formu -->


</body>
</html>