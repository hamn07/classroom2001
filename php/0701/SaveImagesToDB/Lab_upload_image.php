<?php
/*
use class;
create table studentImages (cID int(2), cPicture blob);
*/

if (isset($_POST["btnSubmit"]))
{
	header("content-type:text/html; charset=utf-8");

	$id = $_POST["txtID"];
	$f = fopen($_FILES["fileImage"]["tmp_name"], "rb");
	$picture = addslashes(fread($f, $_FILES["fileImage"]["size"]));

	// create a PDO object and link to MySQL
	$dbh = new PDO("mysql:host=localhost;dbname=class", "root", "password");

	// Run Insert SQL statement
	$result = $dbh->query("INSERT INTO studentImages (cID, cPicture) VALUES ($id, '$picture')");
	if ($result->rowCount() >0)
	echo "圖片己上傳。";
	else
	echo "Error!";

	// close connection
	$dbh = NULL;
	exit();
}
?>
﻿
<!DOCTYPE HTML>
<html lang="zh-TW">
<head>
<title>PHP Sample</title>
<meta charset="utf-8">
</head>

<body>
	<form action="Lab_upload_image.php" method="post"
		enctype="multipart/form-data" name="mainForm" id="mainForm">
		Student ID: <input type="text" name="txtID"><br> Picture: <input
			type="file" name="fileImage"> <br> <input type="submit"
			name="btnSubmit" value="Submit">
	</form>
</body>
</html>
