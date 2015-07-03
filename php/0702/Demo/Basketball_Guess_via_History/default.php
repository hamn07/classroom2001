<?php 
session_start();

if (isset($_POST["btnOK"])) {
	$accessCode = $_POST["txtAccessCode"];
	if ($accessCode == "12481632") {
		$_SESSION["passed"] = 1;		
		header("Location: calcP.php");
		exit;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php require("script_css.php") ?>
</head>
<body>
<div id="labPage" data-role="page" data-theme="d">
<div data-role="header">
	<h3>Lab</h3>
</div>

<div data-role="content">
<form method="post" action="" data-ajax="false">
	Access Code: <input type="text" name="txtAccessCode" id="txtAccessCode" />
	<input type="submit" name="btnOK" value = "OK" />
</form>
</div>
	
</div>
<!-- page -->

</body>
</html>
