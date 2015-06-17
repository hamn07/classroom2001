<?php

function &foo() {
	static $result = "";
	$result .= "ABC";
	echo "In proc: " . $result . "<br>";
	
	return $result;
}

$rtn = &foo();
echo "Out proc: " . $rtn . "<br>";

// $rtn = "123";
// foo();

?>
