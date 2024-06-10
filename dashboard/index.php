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
                                    <div class="page-title-right">
                                        <form class="d-flex">
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                                <span class="input-group-text bg-primary border-primary text-white">
                                                    <i class="mdi mdi-calendar-range font-13"></i>
                                                </span>
                                            </div>
                                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                                <i class="mdi mdi-autorenew"></i>
                                            </a>
                                            <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                                <i class="mdi mdi-filter-variant"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-5 col-lg-6">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-currency-usd widget-icon bg-success-lighten text-success"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Available balance</h5>
                                                <h3 class="mt-3 mb-3">
                                                    <?php
                                                    if($account["conditions"] == "Approve"){
                                                        echo $account["currency"]."".number_format($account["deposite"],2);
                                                    }else{
                                                        echo $account["currency"]."0.00";
                                                    }
                                                    ?>
                                                 </h3>
                                                
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-currency-usd widget-icon bg-success-lighten text-success"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Cleared balance</h5>
                                                <h3 class="mt-3 mb-3">
                                                    <?php
                                                    if($account["conditions"] == "Approve"){
                                                        echo $account["currency"]."".number_format($account["deposite"],2);
                                                    }else{
                                                        echo $account["currency"]."0.00";
                                                    }
                                                    ?></h3>
                                                
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-currency-usd widget-icon bg-success-lighten text-success"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Loan Amount</h5>
                                                <h3 class="mt-3 mb-3">0.00</h3>
                                                
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-currency-usd widget-icon bg-success-lighten text-success"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Growth">Return Amount</h5>
                                                <h3 class="mt-3 mb-3">0.00</h3>
                                                
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row -->

                            </div> <!-- end col -->

                            <div class="col-xl-7 col-lg-6">
                                <div class="card card-h-100">
                                    <div class="card-body">
                                        
                                        <h4 class="header-title mb-3">Local transfer</h4>

                                        <div dir="ltr">
                                           <form action="index.php" method="POST">
                                            

                                            <!-- Bool Switch-->
                                            <input type="checkbox" id="switch1" checked data-switch="bool"/>
                                            <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                            <div class="row">
                                                <div class="col-lg-6 mb-3 position-relative" id="datepicker1">
                                                    <label class="form-label">Account name</label>
                                                    <input type="text" class="form-control" name="ac_name"  required>
                                                </div>
    
                                                <!-- Date View -->
                                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                                    <label class="form-label">Account number</label>
                                                    <input type="text" class="form-control" name="ac_number" required>
                                                </div>

                                                <div class="col-lg-6 mb-3 position-relative" id="datepicker1">
                                                    <label class="form-label">Bank</label>
                                                    <input type="text" class="form-control" name="bank" required>
                                                </div>

                                                <div class="col-lg-6 mb-3 position-relative" id="datepicker1">
                                                    <label class="form-label">Amount</label>
                                                    <input type="number" class="form-control" name="amount" required>
                                                </div>
    
                                                <!-- Date View -->
                                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                                    <label class="form-label">Reason for funds Transfer</label>
                                                    <input type="text" class="form-control" name="reason" required>
                                                </div>
                                            </div>
                                            <div class="justify-content-end row">
                                                <div class="col-12">
                                                    <button type="submit" name="local" class="btn btn-info" style="width: 100%; background-color: brown; font-weight: bolder;">Funds transfer</button>
                                                </div>
                                            </div>
                                           </form>
                                        </div>
                                            
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                       
                                        <h4 class="header-title mb-3">Recent Transaction history</h4>
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

                                        
                                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                           
                                        </div>
                                        <h4 class="header-title">Location</h4>
                                        <div class="mb-4 mt-4">
                                            <div id="world-map-markers" style="height: 224px"></div>
                                        </div>

                                       
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->


                        
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
<?php
if(isset($_POST["local"])){
    $ac_name = $_POST["ac_name"];
    $ac_number = $_POST["ac_number"];
    //$ = $_POST[""];
    $amount = $_POST["amount"];
    $reason = $_POST["reason"];
    $email = $_SESSION["email"];
    //inserting 
    mysqli_query($con,"INSERT INTO `about_to`(`email`, `account_name`, `account_number`, ``, `amount`, `reason`) 
    VALUES ('$email','$ac_name','$ac_number','$','$amount','$reason ')");
    echo'
    <script>
    var cond = confirm("You about make a transfer of'.$amount.' to '.$ac_name.' with account number '.$ac_number.'");
    if(cond == true){
        window.location.href = "cot.php";
    }else{
        window.location.href = "index.php";
    }
    </script>
    ';
    
}
?>
