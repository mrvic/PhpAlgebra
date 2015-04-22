<?php
include "db_mysqli.php";
$query_tpl="
SELECT
nastavnik.imeNastavnik, 
nastavnik.prezNastavnik, 
mjesto.pbr, 
mjesto.nazmjesto
FROM
nastavnik
INNER JOIN
mjesto on nastavnik.pbrStan=mjesto.pbr
WHERE 
mjesto.nazmjesto LIKE ?
";
if ($stmt=$mysqli->prepare($query_tpl)){
  $stmt->bind_param('s',$_GET['mjesto']);
  $stmt->execute();
$stmt->bind_result($ime,$prezime,$pbr,$mjesto);
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
 
</head>
<body>
<ol>

<?php
try {
    while($stmt->fetch()){
    echo "<li>".$ime." ".$prezime." ".$pbr." ".$mjesto."</li>";
 }
  
} catch (Exception $e) {
  
}
?>
 </ol>
</body>
</html>