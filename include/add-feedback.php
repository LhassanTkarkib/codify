<?php

require 'config.php';
require 'db.php';

if ($_POST['name'] == '' ||
   $_POST['email'] == '' ||
   $_POST['message'] == ''
  ) {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Please Fill Up All Info !';
    header('location: ../post.php');
    exit;
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$result = $mysqli->query("INSERT INTO `feedback`(`name`, `email`, `msg`) VALUES ('$name', '$email', '$message')");
exit;
if ($result) {
    $_SESSION['msg']['type'] = 'success';
    $_SESSION['msg']['msg'] = '<i class="fa fa-info-circle"></i> Project posted successfully !';
    header('location: ../client.php');
    exit;
} else {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-info-circle"></i> Error: '.$mysqli->error;
    header('location: ../client.php');
    exit;
}
