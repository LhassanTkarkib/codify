<?php

require 'config.php';
require 'db.php';

if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['usertype'])) {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> All fields are required!';
    header('location: ../login.php');
    exit;
}

$user = $_POST['usertype'];
$email = $_POST['email'];
$password = hash('sha256', $_POST['password']);
$result = $mysqli->query("SELECT * FROM `$user` WHERE `email` = '$email'");
$result1 = $mysqli->query("SELECT * FROM mssgusers WHERE `email` = '$email'");

if ($mysqli->errno) {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Error: '.$mysqli->error;
    header('location: ../login.php');
    exit;
}


if ($result->num_rows) {
    $row = $result->fetch_array();
    $row1=$result1->fetch_array();
    $user_id = ($user == 'client') ? $row['cid'] : $row['fid'];
    if ($row['password'] != $password) {
        // Wrong Password
        $_SESSION['msg']['type'] = 'danger';
        $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i><strong> Wrong Password.</strong> !';
        header('Location: ../login.php');
        exit;
    }elseif ($row1['status']=='Active now') {
        $_SESSION['msg']['type'] = 'danger';
        $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i><strong> You can\'t get to this account right now.</strong> !';
        header('Location: ../login.php');
    }  else {
        // Login Successful
        $remember_me = (isset($_POST['remember_me'])) ? true : false;
        $_SESSION['unique_id']= $row1['unique_id'];
        $_SESSION['USER_ID'] = $user_id;
        $_SESSION['EMAIL'] = $email;
        $_SESSION['USER_NAME'] = $row['name'];
        $_SESSION['USER_TYPE'] = $user;

        $mysqli ->query( "UPDATE mssgusers SET status = 'Active now' WHERE `email` = '$email'");

        if ($remember_me) {
            setcookie('USER_ID', $user_id);
        }
if ($user=='client') {
    header("Location: ../client.php");
}else{ 
        // header("Location: ../$user.php");
        header("Location: ../PFE/freelancer.php");
}
        exit;
        
    }
} else {
    // Wrong Email
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i><strong> Wrong Email!</strong>';
    header('Location: ../login.php');
    exit;
}
