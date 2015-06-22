<?php 
	session_start();
	if(isset($_POST["btnOK"])){
		$sUserName = $_POST["txtUserName"];
		$sPassword = $_POST["txtPassword"];
// 		echo $sUserName;
		if ($sUserName!=""){
			$_SESSION["userName"]=$sUserName;
			header("Location: hello.php");
		}
		else {
			$sPrompt .= "Please keyin your name.";
		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<form method="post">
	<input type="text" name="txtUserName" />
	<input type="password" name="txtPassword" />
	<input type="submit" name="btnOK" value="OK" /><br>
	<p><?php echo $sPrompt?></p>
	
</form>
</body>
</html>