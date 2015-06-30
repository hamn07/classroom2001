<?php

$sJson = '{"cID":"01","cName":"\u7c21\u5949\u541b","cSex":"F","cBirthday":"1987-04-04","cEmail":"elven@superstar.com","cPhone":"0922988876","cAddr":"\u53f0\u5317\u5e02\u6fdf\u6d32\u5317\u8def12\u865f"}';

$obj = json_decode($sJson, false);
echo "<h1> $obj->cName";
$arr = json_decode($sJson, true);
echo "<h2> {$arr['cName']}";

$arrData = Array(1, 2, Array('A', 'B', 'C'), 4, 5);
$arr = json_encode($arrData);
echo "<h3> $arr";
//JSON_FORCE_OBJECT (integer) Outputs an object rather than an array when a non-associative array is used. Especially useful when the recipient of the output is expecting an object and the array is empty. Available since PHP 5.3.0.
$obj = json_encode($arrData, JSON_FORCE_OBJECT);
echo "<h4> $obj";


