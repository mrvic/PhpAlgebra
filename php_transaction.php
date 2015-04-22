<?php

include "db_connection.php";

$error_num=0;

$query="BEGIN";
$result=mysql_query($query);

echo "sydf".nl2br("Neka transakcija...");


$query = <<<"EOD"
INSERT INTO mjesto (pbr,nazMjesto, sifZupanija)
VALUES ('11111','Zzzzzz',9);
EOD;
$result=mysql_query($query);
if(!$result) $error_num++;


$query ="SAVEPOINT SAVE1";
$result=mysql_query($query);

// Pokušamo napraviti grešku unijevši županiju s brojem 99
$query = <<<"EOD"
INSERT INTO mjesto (pbr,nazMjesto, sifZupanija)
VALUES ('22222','Zzzzzz',99);
EOD;
$result=mysql_query($query);
if(!$result) $error_num++;



($error_num<1)? $query="COMMIT": $query="ROLLBACK TO SAVE1";

$result=mysql_query($query);

$query ="COMMIT";
$result=mysql_query($query);

echo " unešen ID:". mysql_insert_id();

?>