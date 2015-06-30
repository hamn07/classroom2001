<?php
require_once 'OOPLib.php';
session_start();
$img = $_SESSION['image'];

$img->desc = 'boracay';
$img->echoDesc();

echo '<h3>';
var_dump($img);

$img = NULL;

echo '<h3>';
var_dump($img);