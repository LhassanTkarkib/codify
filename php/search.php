<?php

    session_start();
    include_once "config.php";
    $usertype = $_SESSION['USER_TYPE'];
    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $pid = $_SESSION['pid'];

    $sql = "SELECT * FROM post_req JOIN mssgusers on post_req.fid = mssgusers.fid AND mssgusers.unique_id != {$outgoing_id} AND mssgusers.usertype != '{$usertype}' AND post_req.pid = {$pid} AND name LIKE '%{$searchTerm}%' ORDER BY status DESC";


    //$sql = "SELECT * FROM mssgusers WHERE unique_id != {$outgoing_id} AND name LIKE '%{$searchTerm}%' AND usertype != '{$usertype}'";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>