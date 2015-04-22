<?php
$name = $_GET['name'];
echo "Welcome $name<br>";
echo "<a href='http://algebra.com/'>Click to Download</a><br/>";
?>

<br/>
<a href="xss_atack.php?name=guest<script>alert('Imas metiljavu zastitu :)')</script>">Stisni ovdje za napad</a>