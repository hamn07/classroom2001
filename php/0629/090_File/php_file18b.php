<?php
header("Content-Type: image/gif");
$filename = fopen("php_file18.gif","rb");	
echo fread($filename,filesize("php_file18.gif"));
fclose($filename);
?>