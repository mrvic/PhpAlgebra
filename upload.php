<?php
include("db_mysqli_test.php");


$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 1024*1024*3; //3 MB
$path = "uploads/"; // Upload directory
$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name is not a valid format";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name))
                $img = resize_image($path.$name, 200, 200);
               // imagejpeg if(move_uploaded_file($img, $path.'thumb_'.$name));
                imagejpeg( $img, $path.'thumb_'.$name );
// UBACI U BAZU
$query = "INSERT INTO galerija (ime) VALUES('".$name."')";
$result=$mysqli->query($query);

	            $count++; // Number of successfully uploaded file
	        }
	    }
	}
}

function resize_image($file, $w, $h, $crop=FALSE) {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}






?>

<!DOCTYPE html>
<html>
<head>
	<title>Neki upload</title>
</head>
<body>

<?php 
if(isset($_POST['Upload'])){
	Echo "uploadam";
	echo "Broj uploadanih fileova: ".$count;
}
else{

	print_r($_POST);
}

?>
<!-- Ovdje formu -->
 <form action="" method="post" enctype="multipart/form-data">
    <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
  <input type="submit" name="Upload" value="Upload!" />
</form>

<?php
// ispis galerije:
if (isset($_POST['Upload'])){
$query = "SELECT id, ime, time FROM galerija";
$result=$mysqli->query($query);

	while ($row=$result->fetch_assoc()) {
		echo $row["id"];
		echo "<a href='uploads/".$row["ime"]."'>";
		echo "<img src='uploads/thumb_".$row["ime"]."'>";
		echo "</a>";
	}

}



?>
</body>
</html>