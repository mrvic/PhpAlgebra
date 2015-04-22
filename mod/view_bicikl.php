<?php

echo '
<table>
<tr>
<th>ID</th>
<th>IME</th>
<th>AKCIJA</th>
</tr>';
foreach ($view_array as $id => $name) {
	echo '
<tr>
<td><b>'.$id.'</b></td>
<td>'.$name.'</td>
<td><a href="#">index.php?act=del&id='.$id.'</a></td>
</tr>
	';
}
echo '
<tfoot>
<tr>
<td>Count:</td>
<td colspan="3">'.count($view_array).'</td></tr>
</tfoot>
';



?>