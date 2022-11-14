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

if (empty($_GET['pid'])) {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Nothing to delete !';
    header('location: ../client.php');
    exit;
}

$pid = $_GET['pid'];

$result = $mysqli->query("DELETE FROM `post_prj` WHERE `pid` = $pid");

if ($result) {
    $_SESSION['msg']['type'] = 'success';
    $_SESSION['msg']['msg'] = '<i class="fa fa-info-circle"></i> Deleted successfully !';
    header('location: ../client.php');
    exit;
} else {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-info-circle"></i> Error: '.$mysqli->error;
    header('location: ../signup.php');
    exit;
}
