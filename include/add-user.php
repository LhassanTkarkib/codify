<?php

require 'config.php';
require 'db.php';

if ($_POST['email'] == '' ||
   $_POST['name'] == '' ||
   $_POST['password'] == '' ||
   $_POST['cpassword'] == '' ||
   $_POST['usertype'] == ''
  ) {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Please Fill Up All Info !';
    header('location: ../signup.php');
    exit;
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$usertype = $_POST['usertype'];
$lang = 's';
//$lang = $_POST['lang'];
$cv = $_FILES['cv'];
$id = $_FILES['id'];

if ($password != $cpassword) {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Password Are Not Same !';
    header('location: ../signup.php');
    exit;
}

if ($usertype != 'freelancer' && $usertype != 'client') {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Select Usertype !';
    header('location: ../signup.php');
    exit;
}

//added by me


if(isset($_FILES['image'])){
    $img_name = $_FILES['image']['name'];
    $img_type = $_FILES['image']['type'];
    $tmp_name = $_FILES['image']['tmp_name'];
    
    $img_explode = explode('.',$img_name);
    $img_ext = end($img_explode);

    $extensions = ["jpeg", "png", "jpg"];
    if(in_array($img_ext, $extensions) === true){
        $types = ["image/jpeg", "image/jpg", "image/png"];
        if(in_array($img_type, $types) === true){
            $time = time();
            $new_img_name = $time.$img_name;
            if(move_uploaded_file($tmp_name,"../php/images/".$new_img_name)){
              
            }
        }else{
            echo "Please upload an image file - jpeg, png, jpg";
        }
    }else{
        echo "Please upload an image file - jpeg, png, jpg";
    }
}


// to here

$result2 = $mysqli->query("SELECT * FROM `mssgusers` WHERE name = '$name' ");
$result = $mysqli->query("SELECT * FROM `mssgusers`  WHERE email = '$email' ");

if ($mysqli->errno) {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Error: '.$mysqli->error;
    header('location: ../signup.php');
    exit;
}
if ($result->num_rows && $result2->num_rows) {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> The Email And Name Already Used !';
    header('location: ../signup.php');
    exit;
}elseif ($result->num_rows) {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Email Already Used !';
    header('location: ../signup.php');
    exit;
}elseif ($result2->num_rows) {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Name Already Used !';
    header('location: ../signup.php');
    exit;
}

if ($usertype == 'freelancer') {
    if (empty($lang)) {
        $_SESSION['msg']['type'] = 'danger';
        $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Programming Language is not given !';
        header('location: ../signup.php');
        exit;
    }

    if (!(file_exists('../user_data') && is_dir('../user_data'))) {
        mkdir('../user_data');
    }

    $cv_path = 'user_data/'.NOW.'-'.$cv['name'];
    $id_path = 'user_data/'.NOW.'-'.$id['name'];

    $c = move_uploaded_file($cv['tmp_name'], '../'.$cv_path);
    $i = move_uploaded_file($id['tmp_name'], '../'.$id_path);

    if (!$c || !$i) {
        $_SESSION['msg']['type'] = 'danger';
        $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Files not save !';
        header('location: ../signup.php');
        exit;
    }
}

$password = hash('sha256', $password);

if ($usertype == 'freelancer') {
    $result = $mysqli->query("INSERT INTO $usertype (`name`, `email`, `password`, `lang`, `cv`, `id_proof`) VALUES
    ('$name', '$email', '$password', '$lang', '$cv_path', '$id_path')");
    
} else {
    $result = $mysqli->query("INSERT INTO $usertype (`name`, `email`, `password`) VALUES
    ('$name', '$email', '$password')");
}

// added by 

if ($usertype == 'freelancer') {
    $ran_id = rand(time(), 100000000);
    $result5 = $mysqli->query("SELECT * FROM $usertype WHERE email = '$email'");
    $row5=mysqli_fetch_assoc($result5);
    $fid = $row5['fid'];
    $result = $mysqli->query("INSERT INTO mssgusers (`unique_id`,`fid`,`name`, `email`, `password`, `usertype`, `img`, `status`) VALUES
    ('$ran_id','$fid','$name', '$email', '$password','$usertype', '$new_img_name', '    Offline')");

        $select_sql2 = $mysqli->query("SELECT * FROM mssgusers WHERE email = '$email'");
        if(mysqli_num_rows($select_sql2) > 0){
            $result = mysqli_fetch_assoc($select_sql2);
            $_SESSION['unique_id'] = $result['unique_id'];
        } 
} else {
    $ran_id = rand(time(), 100000000);
    $result5 = $mysqli->query("SELECT * FROM $usertype WHERE email = '$email'");
    $row5=mysqli_fetch_assoc($result5);
    $cid = $row5['cid'];
    $result = $mysqli->query("INSERT INTO mssgusers (`unique_id`,`cid`,`name`, `email`, `password`, `usertype`, `img`, `status`) VALUES
    ('$ran_id','$cid','$name', '$email', '$password','$usertype', '$new_img_name', 'Offline')");

        $select_sql2 = $mysqli->query("SELECT * FROM mssgusers WHERE email = '$email'");
        if(mysqli_num_rows($select_sql2) > 0){
            $result = mysqli_fetch_assoc($select_sql2);
            $_SESSION['unique_id'] = $result['unique_id'];
        } 
    }



if ($result) {
    $result = $mysqli->query("SELECT * FROM $usertype WHERE email = '$email'");
    $member = $result->fetch_array();
    $_SESSION['USER_ID'] = ($usertype == 'client') ? $row['cid'] : $row['fid'];
    $_SESSION['USER_NAME'] = $row['name'];
    $_SESSION['USER_TYPE'] = $row['usertype'];
    if ($_SESSION['USER_TYPE']=='client') {
        header("location: ../$usertype.php");
        exit;
    }else {
        header("location: ../PFE/freelancer.php");
        exit;
    }

   
  
} else {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-info-circle"></i> Error: '.$mysqli->error;
    header('location: ../signup.php');
    exit;
}
