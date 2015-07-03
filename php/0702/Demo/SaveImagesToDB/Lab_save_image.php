<?php
$dbh = new PDO("mysql:host=localhost;dbname=class", "root", "password");
//$dbh->exec("set names utf8");

$result = $dbh->query("select * from studentImages where cID = 1");
$row = $result->fetch();

$f = fopen("/tmp/image1.jpg", "w");
fwrite($f, $row["cPicture"]);
fclose($f);

$dbh = NULL;
echo "Done.";
?>
