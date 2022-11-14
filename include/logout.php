<?php

require 'config.php';
require 'db.php';
$email=$_SESSION['EMAIL'];
$mysqli ->query( "UPDATE mssgusers SET status = 'Offline' WHERE `email` = '$email'");
unset($_SESSION['EMAIL']);
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_NAME']);
unset($_SESSION['USER_TYPE']);

session_destroy();

header('Location: ../index.php');
exit;
