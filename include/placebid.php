<?php

require 'config.php';
require 'db.php';

if (!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
    $_SESSION['msg']['type'] = 'warning';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Login as freelancer !';
    header('Location: login.php');
    exit;
}
if (!isset($_SESSION['USER_TYPE']) || $_SESSION['USER_TYPE'] != 'freelancer') {
    $_SESSION['msg']['type'] = 'warning';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Login as freelancer !';
    header('Location: login.php');
    exit;
}
$fid = $_SESSION['USER_ID'];

if ($_POST['pid'] == '' || $_POST['pid'] == 0) {
    $_SESSION['msg']['type'] = 'warning';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Invalid request !';
    header('Location: PFE/freelancer.php');
    exit;
}

$pid = $_POST['pid'];

if ($_POST['msg'] == '') {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Please Fill Up All Info !';
    header("location: ../projects.php?pid=$pid");
    exit;
}

$msg = $_POST['msg'];
$price = $_POST['price'];
$duration = $_POST['duration'];

if (strlen($msg) < 30) {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Message is too short !';
    header("location: ../projects.php?pid=$pid");
    exit;
}

$result = $mysqli->query("SELECT * FROM `post_req` WHERE `fid` = $fid AND `pid` = $pid");

if ($mysqli->errno) {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Error: '.$mysqli->error;
    header("location: ../projects.php?pid=$pid");
    exit;
}

if ($result->num_rows) {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Bid already placed !';
    header("location: ../projects.php?pid=$pid");
    exit;
}

$result = $mysqli->query("INSERT INTO `post_req` (`pid`, `fid`, `msg`, `price`,`status`, `duration`) VALUES ($pid, $fid, '$msg', $price,'Asked', '$duration')");

if ($result) {
    $_SESSION['msg']['type'] = 'success';
    $_SESSION['msg']['msg'] = '<i class="fa fa-info-circle"></i> Requested successfully !';
    header("location: ../projects.php?pid=$pid");
    exit;
} else {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-info-circle"></i> Error: '.$mysqli->error;
    header("location: ../projects.php?pid=$pid");
    exit;
}
