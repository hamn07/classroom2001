<?php

if (!isset($_GET['letter'])){
	die('die');
}
$letter = $_GET['letter'];
$result .= sprintf("o=%s",$letter);
$result .= sprintf("o=%s",$letter);
echo $result;

?>