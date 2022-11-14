<!DOCTYPE html>
<?php

require '../include/config.php';
require '../include/db.php';
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/x-icon" sizes="16x16" href="../asset/favicon.ico">
    <title>Freelancer - Codify Admin</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php
        require 'inc/header.php';
        ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <!--h4 class="text-themecolor">Table Basic</h4-->
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../admin">Home</a></li>
                                <li class="breadcrumb-item active">Freelancer</li>
                            </ol>
                          
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Freelancer List</h4>
                                <div class="table-responsive users-list">
                                    <table class="table table-striped">
<?php
$sql = 'SELECT * FROM freelancer';
$result = $mysqli->query($sql);
?>
                                        <thead>
                                            <tr>
                                                <th>Fid</th>
                                                <th>Name</th>
                                                <th>E-mail</th>
                                                <th>Language</th>
                                                <th>CV</th>
                                                <th>ID Proof</th>
                                                <th>Date</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
if ($result->num_rows) {
    while ($row = $result->fetch_assoc()) {
        ?>
                                            <tr>
                                                <td><?=$row['fid']?></td>
                                                <td><?=$row['name']?></td>
                                                <td><?=$row['email']?></td>
                                                <td><?=$row['lang']?></td>
                                                <td><a href="<?=$row['cv']?>" class="btn-link">Resume</a></td>
                                                <td><a href="<?=$row['id_proof']?>" class="btn-link">ID Proof</a></td>
                                                <td><?=$row['date']?></td>
                                                <td class="text-nowrap">
                                                    <a href="inc/delete.php?fid=<?=$row['fid']?>" class="btn btn-outline-danger"><i class="fa fa-close text-danger"></i> Remove</a>
                                                </td>
                                            </tr>
<?php
    }
}
?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                </div>
            </div>
        </div>
        <footer class="footer">
© 2022 Codify by Lhassan tkarkib, Hamza El Yesri
        </footer>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- jQuery peity -->
    <script src="../assets/node_modules/peity/jquery.peity.min.js"></script>
    <script src="../assets/node_modules/peity/jquery.peity.init.js"></script>
    <script src="javascript/users.js"></script>
</body>


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/material/table-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Oct 2018 12:19:53 GMT -->
</html>
</body>
</html>