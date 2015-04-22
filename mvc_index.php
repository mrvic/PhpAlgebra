<?php

switch ($_GET['w']) {
	case 'tool01':
		# code...
	$model='tools/tool01/model.php';
	$view='tools/tool01/view.php';
		break;
		case 'tool02':
		# code...
	$model='tools/tool02/model.php';
	$view='tools/tool02/view.php';
		break;
	default:
		# code...
		break;
}

$polje=array("1"=>"Ivan","2"=>"Ante","3"=>"Ema");

?>

<table>
	<tr><th>ID</th><th>Ime</th><th>Akcija</th></tr>
<?php
foreach ($polje as $key => $value) {
	echo '
<tr><td>'.$key.'</td>
<td>'.$value.'</td>
<td><a href="#">index.php?act=del&id='.$key.'</a></td>
</tr>
	';
}
?>
</table>