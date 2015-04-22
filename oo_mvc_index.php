<?php


if(isset($_GET['what'])){

	$model=$_GET['what'];
}
else {
$model="model";
}

$tool_path="mod/".$model.".php";

if(is_file($tool_path)){
	include($tool_path);
}
$tool=new $model();  // generičko pozivanje modela (objekta)

$view_array=$tool->start();  // svaki model mora imati metodu start();

include ("mod/".$tool->_template);  // ispis modela

?>