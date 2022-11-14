<?php

require 'config.php';
require 'db.php';

if (!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
    header('Location: login.php');
    exit;
}
if (!isset($_SESSION['USER_TYPE']) || $_SESSION['USER_TYPE'] != 'client') {
    header('Location: login.php');
    exit;
}

$cid = $_SESSION['USER_ID'];

if ($_POST['name'] == '' ||
   $_POST['prjtype'] == '' ||
   $_POST['about'] == '' ||
   $_POST['cost'] == ''
  ) {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Please Fill Up All Info !';
    header('location: ../client.php');
    exit;
}

$name = $_POST['name'];
$prjtype = $_POST['prjtype'];
$about = $_POST['about'];
$cost = $_POST['cost'];

$result = $mysqli->query("INSERT INTO `post_prj`(`name`, `detail`, `category`, `lang`, `cid`, `status`, `cost`) VALUES ('$name', '$about', '$prjtype', 's', $cid, 'Pending', $cost)");




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
