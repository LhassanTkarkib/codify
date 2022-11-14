<?php
    session_start();
    include_once "config.php";

 
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $result = $mysqli->query("SELECT * FROM post_req RIGHT JOIN post_prj ON post_req.pid =post_prj.pid WHERE `category` LIKE '%{$searchTerm}%' ORDER BY post_req.status DESC;");
//    $result = $mysqli->query("SELECT * FROM post_req RIGHT JOIN post_prj ON post_req.pid =post_prj.pid WHERE `category` LIKE '%{$searchTerm}%' group by post_req.pid ORDER BY post_req.status DESC;");
    $output = "";
    $count = $result->num_rows;
    $fid = $_SESSION['USER_ID'];
    ?>
    
    
    
    <?php
    if(mysqli_num_rows($result) > 0){
       
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="job-card">
            <div class="job-card-header">
            <?php 
            if ($row['category'] =="Design Graphique") {
              ?>
              
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#fff" style="background-color:#ea4c88">
        <path d="M16.4 23.2C28.6 18.2 25.2 0 12 0a12 12 0 104.4 23.2zM5.3 20c.8-1.5 3.6-5.5 8.3-7 1 2.6 1.7 5.5 1.7 8.8-3.5 1.2-7.3.4-10-1.8zm11.5 1.2a27 27 0 00-1.7-8.4c2-.4 4.5-.2 7.2 1-.6 3.2-2.6 6-5.5 7.4zm5.7-9c-3-1.1-5.7-1.3-8-.8a28 28 0 00-1.1-2.3 20 20 0 006.5-4c1.7 1.9 2.7 4.3 2.6 7zM18.9 4c-.9.8-2.9 2.4-6.3 3.8A28 28 0 008 2.3C11.6.8 15.8 1.4 19 4zM6.6 3c.8.7 2.7 2.5 4.5 5.3a33 33 0 01-9.4 1.5c.6-3 2.4-5.4 4.9-6.9zm-5 8.3c4.2-.1 7.6-.8 10.3-1.7l1.1 2.1A17.4 17.4 0 004.2 19c-1.8-2-2.8-4.7-2.7-7.6z"></path></svg>
              
              <?php 
            }elseif ($row['category'] =="Developpement Mobile") {
              ?>
               <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#fff" style="background-color:#1e1f26">
        <path d="M24 7.6c0-.3 0-.5-.4-.6C12.2.2 12.4-.3 11.6 0 3 5.5.6 6.7.2 7.1c-.3.3-.2.8-.2 8.3 0 .9 7.7 5.5 11.5 8.4.4.3.8.2 1 0 11.2-8 11.5-7.6 11.5-8.4V7.6zm-1.5 6.5l-3.9-2.4L22.5 9zm-5.3-3.2l-4.5-2.7V2L22 7.6zM12 14.5l-3.9-2.7L12 9.5l3.9 2.3zm-.8-12.4v6L6.8 11 2.1 7.6zm-5.8 9.6l-3.9 2.4V9zm1.3 1l4.5 3.1v6l-9-6.3zm6 9.1v-6l4.6-3.1 4.6 2.8z"></path></svg>
        <?php 
            }elseif ($row['category'] =="Video & Animation") {
              ?>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="background-color:#f76754">
        <path xmlns="http://www.w3.org/2000/svg" d="M0 .5h4.2v23H0z" fill="#042b48" data-original="#212121"></path>
        <path xmlns="http://www.w3.org/2000/svg" d="M15.4.5a8.6 8.6 0 100 17.2 8.6 8.6 0 000-17.2z" fill="#fefefe" data-original="#f4511e"></path></svg>
              <?php 
            }elseif ($row['category'] =="Marketing et Vente") {
              ?>
              
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#fff" style="background-color:#1e1f26">
        <path d="M24 7.6c0-.3 0-.5-.4-.6C12.2.2 12.4-.3 11.6 0 3 5.5.6 6.7.2 7.1c-.3.3-.2.8-.2 8.3 0 .9 7.7 5.5 11.5 8.4.4.3.8.2 1 0 11.2-8 11.5-7.6 11.5-8.4V7.6zm-1.5 6.5l-3.9-2.4L22.5 9zm-5.3-3.2l-4.5-2.7V2L22 7.6zM12 14.5l-3.9-2.7L12 9.5l3.9 2.3zm-.8-12.4v6L6.8 11 2.1 7.6zm-5.8 9.6l-3.9 2.4V9zm1.3 1l4.5 3.1v6l-9-6.3zm6 9.1v-6l4.6-3.1 4.6 2.8z"></path></svg>
              <?php 
            }elseif ($row['category'] ==" E-Commerce , CMS et ERP") {
              ?>
           <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#fff" style="background-color:#ea4c88">
        <path d="M16.4 23.2C28.6 18.2 25.2 0 12 0a12 12 0 104.4 23.2zM5.3 20c.8-1.5 3.6-5.5 8.3-7 1 2.6 1.7 5.5 1.7 8.8-3.5 1.2-7.3.4-10-1.8zm11.5 1.2a27 27 0 00-1.7-8.4c2-.4 4.5-.2 7.2 1-.6 3.2-2.6 6-5.5 7.4zm5.7-9c-3-1.1-5.7-1.3-8-.8a28 28 0 00-1.1-2.3 20 20 0 006.5-4c1.7 1.9 2.7 4.3 2.6 7zM18.9 4c-.9.8-2.9 2.4-6.3 3.8A28 28 0 008 2.3C11.6.8 15.8 1.4 19 4zM6.6 3c.8.7 2.7 2.5 4.5 5.3a33 33 0 01-9.4 1.5c.6-3 2.4-5.4 4.9-6.9zm-5 8.3c4.2-.1 7.6-.8 10.3-1.7l1.1 2.1A17.4 17.4 0 004.2 19c-1.8-2-2.8-4.7-2.7-7.6z"></path></svg>
              

<?php 
            }
            ?>
             <?php
        $res = $mysqli->query("SELECT * FROM `post_req` WHERE `pid` = {$row['pid']} AND `fid` = {$fid}");
            if ($res->num_rows) {
                $r = $res->fetch_assoc();
                $status = empty($r['status']) ? 'Requested' : $r['status'];
            } else {
                $status = '';
            }?>
             <div class="label"><?=$status?></div>
            </div>
            <div class="job-card-title"><?=ucfirst($row['name'])?></div>
            
            <div class="job-card-subtitle">
            <?=substr($row['detail'], 0, 100)?>
            </div>
            <div class="job-card-subtitle">
            </div>
            <div class="job-detail-buttons">
             <button class="search-buttons detail-button">Cost : </i> <?=$row['cost']?></button>
             <button class="search-buttons detail-button"><?=$row['lang']?></button>
             <button class="search-buttons detail-button"><?=$row['category']?></button>
            </div>
            <div class="job-card-buttons">
            <a class="search-buttons card-buttons" style="text-decoration:none;" href="../projects.php?pid=<?=$row['pid']?>" target="_blank"> Postuler maintenant</a>
            <a style="text-decoration:none;"href="../chat.php?pid=<?=$row['pid']?>&cid=<?=$row['cid']?>&user_id=<?=$ryu['unique_id']?>" target="_blank" ><button style=" height: 38px;
    width: 184px;" class="search-buttons card-buttons-msg">Chat</button></a>
            
          </div>
           </div>
        
           <?php
        }
        
    }else{
        $output .= 'No user result related to your search term';
    }
    echo $output;
?>