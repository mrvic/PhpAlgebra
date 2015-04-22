<?php
include "db_mysqli.php";
$query_tpl="SELECT pbr,nazmjesto FROM mjesto";
if ($stmt=$mysqli->prepare($query_tpl)){
  $stmt->execute();
$stmt->bind_result($pbr,$mjesto);
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Autocomplete - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    var availableTags = [
    <?php
  while($stmt->fetch()){
    echo "\"".$mjesto."\"".",";
  }
    ?>
    ""
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  });
  </script>
</head>
<body>
Autocomplete <br/>
<form action="autocomplete_page2.php" method="get">
<div class="ui-widget">
  <label for="tags">Tags: </label>
  <input type="text" name="mjesto" id="tags">
</div>
<input type="submit" name="Posalji">
 <form>
 
</body>
</html>