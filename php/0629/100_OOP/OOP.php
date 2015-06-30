<?php 

include_once 'OOPLib.php';

session_start();
if (!isset($_SESSION['image'])) {
	$img = new image('lily-image.jpg');
	$_SESSION['image']=$img;
}

header("Location: OOP2.php");

?>