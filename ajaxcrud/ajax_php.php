<?php

echo "test";

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
		$( document ).ready(function() {
  	$( "#result" ).load( "stud_select.php", function() {
			//alert( "Load was performed." );
		});
});
function edit(id){

  	$( "#result" ).load( "stud_update.php?id="+id, function() {
			//alert( "Load was performed." );
		});

}
	
	</script>

</head>
<body>


<div id="result">
  

</div>

</body>
</html>