<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>

<form method="post" action="processData.php">
	<img id="captcha" src="securimage/securimage_show.php" alt="驗證圖片" />
	<input type="text" name="captcha_code" size="10" maxlength="6" />
	<a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">[ 更換圖片 ]</a>
	<input type="submit" name="btnOK" value="OK, send it.">
</form>


</body>
</html>