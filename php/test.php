

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php
phpinfo(INFO_GENERAL);
$myArr = array (
		'img1',
		'img3',
		'img5',
		'img2',
		'img11' 
);
natsort($myArr);
var_dump ( $myArr );
echo '<br>';
print_r($myArr);
$s = 'henry';

echo "<h1>" . $myArr ['myName'] . "</h1>";
foreach ( $myArr as $key => $value ) {
	echo "<h3>" . $key . ": " . $value . "<br>";
}
?>
</body>
</html>