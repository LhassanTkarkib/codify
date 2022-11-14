<?php


$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'Codify';
$port = "3306";
$site = 'Codify';

$logo = 'asset/logo.png';
$favicon = 'asset/favicon.ico';



$conn = new mysqli($host, $user, $pass, "Codify", $port);
$mysqli = new mysqli($host, $user, $pass, "Codify", $port);

if ($mysqli->connect_errno) {
    echo 'Connect Error ('.$mysqli->connect_errno.') '.$mysqli->connect_error;
    exit;
}

  
?>