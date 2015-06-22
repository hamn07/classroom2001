<?php

$result = 0;
for ($i = 1; $i <= 3; $i++) {
	for ($j = $i; $j <= 10; $j++) {
		echo "$i / $j / $result <br>";
		$result += $j;
		if ($j >= 3)
			continue 2;
	}
}

echo "Result = $result";

?>