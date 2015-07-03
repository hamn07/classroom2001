<?php

$__DEV_HOME = 1;
if ($__DEV_HOME == 1) {
	$dbhost = '127.0.0.1';
	$dbuser = 'root';
	$dbpass = 'root';
	$dbname = 'test_nba';
} 
else {
	$dbhost = 'mysql.hostinger.co.uk';
	$dbuser = 'u#####_root';
	$dbpass = '###########';
	$dbname = 'u########_nba';
}

?>