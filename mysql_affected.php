<?php

include "db_connection.php";


$query=<<<SQL

INSERT INTO `fakultet`.`stud` (`imeStud`, `prezStud`, `pbrRod`, `pbrStan`, `datRodStud`,`jmbgStud`) 
VALUES ('Marko', 'Markić', 20225, 32235, '2015-03-17 21:11:22','1501984377777');


SQL;



$result= mysql_query($query);

echo "Ukupan broj redova je: ".mysql_affected_rows();

echo "Zadnji unešen ID je: ".mysql_insert_id();

$query=<<<SQL

SELECT * FROM stud;


SQL;
$result= mysql_query($query);

echo "Ukupno kolumni u tablici: ".mysql_num_fields($result);




?>