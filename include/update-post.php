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

if ($_POST['pid'] == '' ||
   $_POST['pid'] == 0 ||
   $_POST['name'] == '' ||
   $_POST['prjtype'] == '' ||
   $_POST['about'] == '' ||
   $_POST['lang'] == '' ||
   $_POST['cost'] == ''
  ) {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Please Fill Up All Info !';
    header('location: ../post.php');
    exit;
}

$pid = $_POST['pid'];
$name = $_POST['name'];
$prjtype = $_POST['prjtype'];
$about = $_POST['about'];
$lang = $_POST['lang'];
$cost = $_POST['cost'];

$result = $mysqli->query("UPDATE `post_prj` SET `name` = '$name', `detail` = '$about', `category` = '$prjtype', `lang` = '$lang', `cid` = $cid, `cost` = $cost WHERE `pid` = $pid");

if ($result) {
    $_SESSION['msg']['type'] = 'success';
    $_SESSION['msg']['msg'] = '<i class="fa fa-info-circle"></i> Project updated successfully !';
    header("location: ../post.php?pid=$pid");
    exit;
} else {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-info-circle"></i> Error: '.$mysqli->error;
    header("location: ../post.php?pid=$pid");
    exit;
}
