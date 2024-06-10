<?php
session_start();
require("function_member.php");
require("connect.php");
require("function_contact.php");
require("function_security.php");
require("function_account.php");
require("function_loan.php");
if(!isset($_SESSION["email"])){
    header("location:../login");
}
$member = member($_SESSION["email"]);
$contact = contact($_SESSION["email"]);
$security = security($_SESSION["email"]);
$account = account($_SESSION["email"]);
$loan = loan($_SESSION["email"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>oceansgrey  Dashbord</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logo2.png">

        <!-- third party css -->
        <link href="assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

       <!-- App css -->
       <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
       <link href="assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="light-style" />
       <link href="assets/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
        
    </head>

    <body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>

        <!-- Topbar Start -->
        <div class="navbar-custom topnav-navbar " style="background-color: brown;">
        <div class="container-fluid">

<!-- LOGO -->
<a href="index.html" class="topnav-logo">
                    <span class="topnav-logo-lg">
                        <img src="assets/images/logo.png" alt="" >
                    </span>
                    <span class="topnav-logo-sm">
                    <img src="assets/images/logo.png" alt="" >
                    </span>
                </a>
<ul class="list-unstyled topbar-menu float-end mb-0">

    <li class="dropdown notification-list d-xl-none">
        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <i class="dripicons-search noti-icon"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
            <form class="p-3">
                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
            </form>
        </div>
    </li>


    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true"
            aria-expanded="false">
            <span class="account-user-avatar"> 
                <img src="images/<?php echo $member["photo"]; ?>" alt="user-image" class="rounded-circle">
            </span>
            <span>
                <span class="account-user-name"><?php echo $account["account_name"]; ?></span>
                
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
            <!-- item-->
            <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome !</h6>
            </div>

            <!-- item-->
            <a href="account.php" class="dropdown-item notify-item">
                <i class="mdi mdi-account-circle me-1"></i>
                <span>My Account</span>
            </a>

            <!-- item-->
            

            <!-- item-->
            <a href="support.php" class="dropdown-item notify-item">
                <i class="mdi mdi-lifebuoy me-1"></i>
                <span>Support</span>
            </a>

            <!-- item-->
           

            <!-- item-->
            <a href="logout.php" class="dropdown-item notify-item">
                <i class="mdi mdi-logout me-1"></i>
                <span>Logout</span>
            </a>

        </div>
    </li>

</ul>
<a class="button-menu-mobile disable-btn">
    <div class="lines">
        <span></span>
        <span></span>
        <span></span>
    </div>
</a>
<div class="app-search dropdown">
    <form>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search..." id="top-search">
            <span class="mdi mdi-magnify search-icon"></span>
            <button class="input-group-text btn-primary" type="submit">Search</button>
        </div>
    </form>
     
</div>
</div>
        </div>
        <!-- end Topbar -->
        
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- Begin page -->
            <div class="wrapper">

                <!-- ========== Left Sidebar Start ========== -->
                <div class="leftside-menu leftside-menu-detached">

                    <div class="leftbar-user">
                        <a href="javascript: void(0);">
                            <img src="images/<?php echo $member["photo"]; ?>" alt="user-image" height="42" class="rounded-circle shadow-sm">
                            <span class="leftbar-user-name"><?php echo $account["account_name"]; ?></span>
                        </a>
                    </div>

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title side-nav-item">Navigation</li>

                        <li class="side-nav-item">
                        <a href="index.php" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                
                                <span> Dashboards </span>
                            </a>
                           
                        </li>

                        

                        <li class="side-nav-item">
                            <a href="transfer.php" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Funds Transfer</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="sttp_transfer.php" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> STP Transfer</span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="trasaction.php" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span> Transaction History</span>
                            </a>
                        </li>

                        

                        <li class="side-nav-item">
                            <a href="credit_card.php" target="_blank" class="side-nav-link">
                                <i class="uil-globe"></i>
                                
                                <span> Credit Card</span>
                            </a>
                        </li>
                        
                        <li class="side-nav-item">
                            <a href="view_wallet.php" target="_blank" class="side-nav-link">
                                <i class="uil-globe"></i>
                                
                                <span> STP Wallet</span>
                            </a>
                        </li>

                        
                    </ul>

                    <!-- Help Box -->
                    <div class="help-box help-box-light text-center">
                        <a href="javascript: void(0);" class="float-end close-btn text-body">
                            <i class="mdi mdi-close"></i>
                        </a>
                        <img src="assets/images/help-icon.svg" height="90" alt="Helper Icon Image" />
                        <h5 class="mt-3">Unlimited Access</h5>
                        <p class="mb-3">We offer variety of account type</p>
                        <a href="javascript: void(0);" class="btn btn-outline-primary btn-sm">Upgrade Account</a>
                    </div>
                    <!-- end Help Box -->
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>
                    <!-- Sidebar -left -->

                </div>
                <!-- Left Sidebar End -->

                <div class="content-page">
                    <div class="content">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    
                                    <h4 class="page-title">Account</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 


                        <div class="row">
                            <div class="col-sm-12" >
                                <!-- Profile -->
                                <div class="card" style="background-color: brown;">
                                    <div class="card-body profile-user-box">

                                        <div class="row" >
                                            <div class="col-sm-8" >
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <div class="avatar-lg">
                                                            <img src="images/<?php echo $member["photo"]; ?>" alt="" class="rounded-circle img-thumbnail">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div>
                                                            <h4 class="mt-1 mb-1 text-white"><?php echo $account["account_name"] ?></h4>
                                                            <p class="font-13 text-white-50"> Account owner</p>
    
                                                            <ul class="mb-0 list-inline text-light">
                                                                <li class="list-inline-item me-3">
                                                                    <h5 class="mb-1"><?php
                                                    if($account["conditions"] == "Approve"){
                                                        echo $account["currency"]."".number_format($account["deposite"],2);
                                                    }else{
                                                        echo $account["currency"]."0.00";
                                                    }
                                                    ?></h5>
                                                                    <p class="mb-0 font-13 text-white-50">Available amount</p>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <h5 class="mb-1"><?php
                                                    if($account["conditions"] == "Approve"){
                                                        echo $account["currency"]."".number_format($account["deposite"],2);
                                                    }else{
                                                        echo $account["currency"]."0.00";
                                                    }
                                                    ?></h5>
                                                                    <p class="mb-0 font-13 text-white-50">Clear amount</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-sm-4">
                                                <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                                    <button type="button" class="btn btn-light">
                                                        <i class="mdi mdi-account-edit me-1"></i> <?php echo $account["account_type"] ?>
                                                    </button>
                                                </div>
                                            </div> <!-- end col-->
                                        </div> <!-- end row -->

                                    </div> <!-- end card-body/ profile-user-box-->
                                </div><!--end profile/ card -->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-xl-4">
                                <!-- Personal-Information -->
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-3">Account Details</h4>
                                        

                                        <hr/>

                                        <div class="text-start">
                                            <p class="text-muted"><strong>Account Name :</strong> <span class="ms-2"><?php echo $account["account_name"] ?></span></p>

                                            <p class="text-muted"><strong>Account type :</strong><span class="ms-2"><?php echo $account["account_type"] ?></span></p>

                                            <p class="text-muted"><strong>Currency :</strong> <span class="ms-2"><?php echo $account["currency"] ?></span></p>

                                            <p class="text-muted"><strong>Account number :</strong> <span class="ms-2"><?php echo $account["account_number"] ?></span></p>

                                           
                                            

                                        </div>
                                    </div>
                                </div>
                                <!-- Personal-Information -->

                                <!-- Toll free number box-->
                                <!-- end card-->
                                <!-- End Toll free number box-->

                                <!-- Messages-->
                                

                            </div> <!-- end col-->

                            <div class="col-xl-8">

                                <!-- Chart-->
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">Recent Trasaction History</h4>
                                        <?php
                                        $email = $_SESSION["email"];
                                        $query = mysqli_query($con,"SELECT * FROM `transaction_history` WHERE `email`='$email'");
                                        $link_th = mysqli_num_rows($query);
                                        if($link_th > 0){
                                            echo'<table class="table table-striped table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th>Narative</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                            while($link_th2 = mysqli_fetch_assoc($query)){

                                                echo' <tr>
                                                <td class="table-user">
                                                    
                                                    '.$link_th2["date"].'
                                                </td>
                                                <td>'.$link_th2["type"].'</td>
                                                <td>'.$link_th2["amount"].'</td>
                                                <td class="table-action">
                                                '.$link_th2["narative"].'
                                                </td>
                                            </tr>';

                                            }
                                            echo'</tbody>
                                            </table>';

                                        }else{
                                            echo'<h4 class="header-title mb-3" style="color:red;">No record found</h4>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- End Chart-->

                                 <!-- end row-->

                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->
                        
                    </div> <!-- End Content -->

                    <!-- Footer Start -->
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end footer-links d-none d-md-block">
                                        <a href="javascript: void(0);">About</a>
                                        <a href="javascript: void(0);">Support</a>
                                        <a href="javascript: void(0);">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- end Footer -->

                </div> 
                <!-- content-page -->

            </div> <!-- end wrapper-->
        </div>
        <!-- END Container -->


        <!-- Right Sidebar -->
        

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->


        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="assets/js/vendor/apexcharts.min.js"></script>
        <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="assets/js/pages/demo.dashboard.js"></script>
       <script src="//code.tidio.co/rjglcrjyvzlshfz4cysq3fabyzikypga.js" async></script>
        <!-- end demo js-->
        
    </body>

<!-- Mirrored from coderthemes.com/hyper/modern/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Sep 2021 04:39:42 GMT -->
</html>
