<?php
require_once("db_connection.php");
require("tabla.class.php");

$t1 = new tabla("select * from stud LIMIT 10");
$t1->ispis3();
?>