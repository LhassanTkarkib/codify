<?php

require '../../include/config.php';
require '../../include/db.php';

if (!empty($_GET['cid'])) {
    $result = $mysqli->query("SELECT * FROM `mssgusers` WHERE `cid` = {$_GET['cid']}");
    $row = $result->fetch_assoc();
    $uid = $row['unique_id'];
    $mysqli->query("DELETE FROM `messages` WHERE (`incoming_msg_id` = {$uid}) OR (`outgoing_msg_id` = {$uid})");
    $mysqli->query("DELETE FROM `client` WHERE `cid` = {$_GET['cid']}");
    $mysqli->query("DELETE FROM `mssgusers` WHERE `cid` = {$_GET['cid']}");
    $mysqli->query("DELETE FROM `post_prj` WHERE `cid` = {$_GET['cid']}");
    header('Location: ../client.php');
    exit;
} elseif (!empty($_GET['fid'])) {
    $result = $mysqli->query("SELECT * FROM `mssgusers` WHERE `fid` = {$_GET['fid']}");
    $row = $result->fetch_assoc();
    $uid = $row['unique_id'];
    $mysqli->query("DELETE FROM `messages` WHERE (`incoming_msg_id` = {$uid}) OR (`outgoing_msg_id` = {$uid})");
    $mysqli->query("DELETE FROM `mssgusers` WHERE `fid` = {$_GET['fid']}");
    $mysqli->query("DELETE FROM `post_req` WHERE `fid` = {$_GET['fid']}");
    $mysqli->query("DELETE FROM `freelancer` WHERE `fid` = {$_GET['fid']}");
    header('Location: ../freelancer.php');
    exit;
} elseif (!empty($_GET['fbid'])) {
    $mysqli->query("DELETE FROM `feedback` WHERE `fbid` = {$_GET['fbid']}");
    header('Location: ../feedback.php');
    exit;
} elseif (!empty($_GET['pid'])) {
    $mysqli->query("DELETE FROM `post_prj` WHERE `pid` = {$_GET['pid']}");
    $mysqli->query("DELETE FROM `post_req` WHERE `pid` = {$_GET['pid']}");
    header('Location: ../project.php');
    exit;
} else {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Invalid Request!';
    header('location: ../login.php');
    exit;
}
