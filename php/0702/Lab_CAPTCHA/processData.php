<?php
session_start(); 

include_once('securimage/securimage.php');
$securimage = new Securimage();

if ($securimage->check($_POST['captcha_code']) == false) {
	header("Content-Type:text/html; charset=utf-8");
	echo "呃... 不對喔!<br /><br />";
	echo "請 <a href='javascript:history.go(-1)'>回上一頁</a>重試一次。";
	exit;
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>

Test OK!

</body>
</html>