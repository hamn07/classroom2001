<?php
	// $fileDir = "C:\\PHP";
	$fileDir = dirname(realpath("."));
	$fileResource = scandir($fileDir);
	echo "<table border='1' width='100%'><tr><td width='20%' valign='top'>資料夾：</td><td>";
	foreach($fileResource as $fileName){
		if(is_dir($fileDir.'/'.$fileName))	echo $fileName."<br />";
	}
	echo "</td></tr><tr><td width='20%' valign='top'>檔案：</td><td>";
	foreach($fileResource as $fileName){
		if(is_file($fileDir.'/'.$fileName))	echo $fileName."<br />";
	}
	echo "</td></tr></table>";
?>