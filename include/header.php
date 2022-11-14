<?php

?>
    <!-- Navigation -->
    <a class="menu-toggle rounded" href="#">
      <i class="fa fa-bars"></i>
    </a>
    <nav id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a class="js-scroll-trigger" href="index.php"><?=$site?></a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="index.php">Home</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="index.php#about">About</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="index.php#services">Services</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="index.php#team">Team</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="index.php#contact">Contact</a>
        </li>
        <?php
        if (!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
            ?>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="login.php">Login</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="signup.php">Signup</a>
        </li>
        <?php
        } else {
            ?>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="<?=$_SESSION['USER_TYPE']?>.php">Dashboard</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="include/logout.php">Logout</a>
        </li>
        <?php
        }
        ?>
      </ul>
    </nav>

    <nav class="col-2 navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="">
        <a class="navbar-brand js-scroll-trigger brand-name" href="index.php"><?=$site?></a>
      </div>
    </nav>
