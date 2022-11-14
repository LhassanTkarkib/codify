<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $usertype = $_SESSION['USER_TYPE'];
  

    $pid = $_SESSION['pid'];
    $fid = $_SESSION['fid'];
    $cid = $_SESSION['cid'];
    if ($usertype == 'client') {  
        $sql = "SELECT * FROM post_req JOIN mssgusers on post_req.fid = mssgusers.fid AND mssgusers.unique_id != {$outgoing_id} AND mssgusers.usertype != '{$usertype}' AND post_req.pid = {$pid} AND post_req.fid = {$fid} ORDER BY user_id DESC";
    }else {
        $sql = "SELECT * FROM post_prj JOIN mssgusers on post_prj.cid = mssgusers.cid AND mssgusers.unique_id != {$outgoing_id} AND mssgusers.usertype != '{$usertype}' AND post_prj.pid = {$pid} AND post_prj.cid = {$cid} ORDER BY user_id DESC";
    }

    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
        
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;

?>