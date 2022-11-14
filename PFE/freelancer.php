<?php 
require '../include/config.php';
require '../include/db.php';

if (!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
    header('Location: ../login.php');
    exit;
}
if (!isset($_SESSION['USER_TYPE']) || $_SESSION['USER_TYPE'] != 'freelancer') {
    header('Location: ../login.php');
    exit;
}
$fid = $_SESSION['USER_ID'];
//aji
$result = $mysqli->query("SELECT `lang` FROM `freelancer` WHERE `fid` = $fid");
$row = $result->fetch_assoc();
$lang = $row['lang'];

$result = $mysqli->query("SELECT * FROM post_req RIGHT JOIN post_prj ON post_req.pid =post_prj.pid ORDER BY post_req.status DESC ;");
$count = $result->num_rows;
// $result = $mysqli->query("SELECT * FROM post_req RIGHT JOIN post_prj ON post_req.pid =post_prj.pid group by post_req.pid ORDER BY post_req.status DESC ;");


$result3 = $mysqli->query("SELECT * FROM `freelancer` WHERE `fid` = $fid");
$row3 = $result3->fetch_assoc();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="projects.css">
    <title>Document</title>
</head>


<body>
<div class="job">
 <div class="header">
  <div class="logo">
   <img src="logoco.png" height="30px" style="margin-right: 10px;" alt="" srcset="">
   Codify
  </div>
  <div class="header-menu">
   
  </div>
  <div class="user-settings">
   <div class="dark-light">
    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
     <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" /></svg>
   </div>
   <?php $result8 = $mysqli->query("SELECT * FROM `mssgusers` WHERE `fid` = $fid");
$row8 = $result8->fetch_assoc();?>
   <img class="user-profile" src="../php/images/<?php echo $row8['img']?>" alt="">
   <div class="user-name"><?php echo $row3['name']?></div>
   <div class="user-name" style="padding: 0 25px;"><a href="../include/logout.php" style="text-decoration: none;display: inline-block;
  background-color: #1B262C;
  font-size: 15px;
  font-weight: 400;
  color: #fff;
  text-transform: capitalize;
  padding: 7px 12px;
  border-radius: 23px;
  letter-spacing: 0.25px;
  transition: all .3s;">Logout</a></div>
  </div>
 </div>


 <div class="banner">
  <div>
  <h1>Dashboard <br> <span> Freelancer</span></h1>  <br>
  <div class="down-buttons">
                    <div class="main-blue-button-hover">
                      <a style="text-decoration:none ;" href="#wrapper">Voir Missions déposées</a>
                    </div>
                   
                  </div>
  </div>
  <div class="imageback">
    <img style="max-width: 94%;" src="bg.svg" alt="">
  </div>
 
 </div> 
 </div>







 <div id="wrapper" class="wrapper">
  <div class="search-menu">
   <div class="search-bar search">
    <input type="text" class="search-box" autofocus />
   </div>
  </div>
  <div class="main-container">
  
   <div class="searched-jobs">
    <div class="searched-bar">
     <div class="searched-show">Showing <?php echo $lang?> Jobs</div>
     
    </div>
    <div class="job-cards projects-list">
    <?php
    while ($row = $result->fetch_assoc()) {
            ?>
            <?php
        $res = $mysqli->query("SELECT * FROM `post_req` WHERE `pid` = {$row['pid']} AND `fid` = {$fid}");
            if ($res->num_rows) {
                $r = $res->fetch_assoc();
                $status = $r['status'];
            } else {
                $status = '';
            }?>
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
             
             <button class="search-buttons detail-button"><?=$row['category']?></button>
            </div>
            <div class="job-card-buttons">
              <?php  
              $ryukiro = $mysqli->query("SELECT * FROM `mssgusers` WHERE `cid` = {$row['cid']}");
              $ryu = $ryukiro->fetch_assoc();
              
              ?>
           <a class="search-buttons card-buttons" style="text-decoration:none;" href="../projects.php?pid=<?=$row['pid']?>" target="_blank"> Postuler maintenant</a>
           <a style="text-decoration:none;"href="../chat.php?pid=<?=$row['pid']?>&cid=<?=$row['cid']?>&user_id=<?=$ryu['unique_id']?>" target="_blank" ><button style=" height: 38px;
    width: 184px;" class="search-buttons card-buttons-msg">Chat</button></a> </div>
           </div>
        
           <?php
        }
?>
     
    </div>
    <div class="job-overview">
     <div class="job-overview-cards">
      <div class="job-overview-card">
       <div class="job-card overview-card">
        <div class="overview-wrapper">
         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M113.5 309.4L95.6 376l-65 1.4A254.9 254.9 0 010 256c0-42.5 10.3-82.5 28.6-117.7l58 10.6 25.4 57.6a152.2 152.2 0 001.5 103z" fill="#fbbb00" />
        <path d="M507.5 208.2a256.3 256.3 0 01-91.2 247.4l-73-3.7-10.4-64.5c29.9-17.6 53.3-45 65.6-78H261.6V208.3h246z" fill="#518ef8" />
        <path d="M416.3 455.6a256 256 0 01-385.8-78.3l83-67.9a152.2 152.2 0 00219.4 78l83.4 68.2z" fill="#28b446" />
        <path d="M419.4 59l-83 67.8A152.3 152.3 0 00112 206.5l-83.4-68.2a256 256 0 01390.8-79.4z" fill="#f14336" /></svg>
         <div class="overview-detail">
          <div class="job-card-title">UX Designer</div>
          <div class="job-card-subtitle">
           2972 Westheimer Rd. Santa Ana.
          </div>
         </div>
         <svg class="heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
          <path d="M20.8 4.6a5.5 5.5 0 00-7.7 0l-1.1 1-1-1a5.5 5.5 0 00-7.8 7.8l1 1 7.8 7.8 7.8-7.7 1-1.1a5.5 5.5 0 000-7.8z" /></svg>
        </div>
        <div class="job-overview-buttons">
         <div class="search-buttons time-button">Full Time</div>
         <div class="search-buttons level-button">Senior Level</div>
         <div class="job-stat">New</div>
         <div class="job-day">4d</div>
        </div>
       </div>
      </div> 


     </div>
     <div class="job-explain">
      <img class="job-bg" alt="">
      <div class="job-logos">
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="background-color:#f76754">
        <path xmlns="http://www.w3.org/2000/svg" d="M0 .5h4.2v23H0z" fill="#042b48" data-original="#212121"></path>
        <path xmlns="http://www.w3.org/2000/svg" d="M15.4.5a8.6 8.6 0 100 17.2 8.6 8.6 0 000-17.2z" fill="#fefefe" data-original="#f4511e"></path></svg>
      </div>
      <div class="job-explain-content">
      <div class="job-title-wrapper">
       <div class="job-card-title">UI /UX Designer</div>
       <div class="job-action">
        <svg class="heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
          <path d="M20.8 4.6a5.5 5.5 0 00-7.7 0l-1.1 1-1-1a5.5 5.5 0 00-7.8 7.8l1 1 7.8 7.8 7.8-7.7 1-1.1a5.5 5.5 0 000-7.8z" /></svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path d="M8.6 13.5l6.8 4M15.4 6.5l-6.8 4"/></svg>
       </div>
       </div>
       <div class="job-subtitle-wrapper">
        <div class="company-name">Patreon <span class="comp-location">Londontowne, MD.</span></div>
        <div class="posted">Posted 8 days ago<span class="app-number">98 Application</span></div>
       </div>
       <div class="explain-bar">
        <div class="explain-contents">
        <div class="explain-title">Experience</div>
        <div class="explain-subtitle">Minimum 1 Year</div>
         </div>
        <div class="explain-contents">
        <div class="explain-title">Work Level</div>
        <div class="explain-subtitle">Senior level</div>
         </div>
        <div class="explain-contents">
        <div class="explain-title">Employee Type</div>
        <div class="explain-subtitle">Full Time Jobs</div>
         </div>
        <div class="explain-contents">
        <div class="explain-title">Offer Salary</div>
        <div class="explain-subtitle">$2150.0 / Month</div>
         </div>
       </div>
       <div class="overview-text">
        <div class="overview-text-header">Overview</div>
        <div class="overview-text-subheader">We believe that design (and you) will be critical to the company's success. You will work with our founders and our early customers to help define and build our product functionality, while maintaining the quality bar that customers have come to expect from modern SaaS applications. You have a strong background in product design with a quantitavely anf qualitatively analytical mindset. You will also have the opportunity to craft our overall product and visual identity and should be comfortable to flex into working.</div>
       </div>
       <div class="overview-text">
        <div class="overview-text-header">Job Description</div>
        <div class="overview-text-item">3+ years working as a product designer.</div>
        <div class="overview-text-item">A portfolio that highlights your approach to problem solving, as well as you skills in UI.</div>
        <div class="overview-text-item">Experience conducting research and building out smooth flows.</div>
        <div class="overview-text-item">Excellent communication skills with a well-defined design process.</div>
        <div class="overview-text-item">Familiarity with design tools like Sketch and Figma</div>
        <div class="overview-text-item">Up-level our overall design and bring consistency to end-user facing properties</div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>

<!-- <script src="projects.js"></script> -->
<script src="freelancersearch/users.js"></script>
</body>
</html>