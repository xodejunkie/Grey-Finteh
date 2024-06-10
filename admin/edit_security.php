<?php
require("connect.php");
session_start();
if(!isset($_SESSION["username"])){
	header("location:admin_login.html");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>oceansgrey</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logo-light.png">

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
        <div class="navbar-custom topnav-navbar " style="background-color: #26209e;">
            <div class="container-fluid">

                <!-- LOGO -->
                <a href="index.html" class="topnav-logo">
                    <span class="topnav-logo-lg">
                        <img src="assets/images/logo-light.png" alt="" style="height:50px;">
                    </span>
                    <span class="topnav-logo-sm">
                        <img src="assets/images/logo_sm.png" alt="" style="height:50px;">
                    </span>
                </a>

                <ul class="list-unstyled topbar-menu float-end mb-0">

                    <li class="dropdown notification-list d-xl-none">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-search noti-icon"></i>
                        </a>
                        
                    </li>
            
    
                    <li class="dropdown notification-list">
                        
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>
    
                            <!-- item-->
                            
    
                            <!-- item-->
                            
    
                            <!-- item-->
                            
    
                            <!-- item-->
                           
    
                           
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
                            <a href="details.php" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Contact Details</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="security.php" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Security</span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="trasaction.php" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span> Transaction History</span>
                            </a>
                        </li>

                        

                        <li class="side-nav-item">
                            <a href="account.php"  class="side-nav-link">
                                <i class="uil-globe"></i>
                                
                                <span> Account</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="stp_transaction.php"  class="side-nav-link">
                                <i class="uil-globe"></i>
                                
                                <span> Stp Transaction History </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="code.php"  class="side-nav-link">
                                <i class="uil-globe"></i>
                                
                                <span>Generate Code</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="cot.php"  class="side-nav-link">
                                <i class="uil-globe"></i>
                                
                                <span> View Transfer Process Code</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="tax.php"  class="side-nav-link">
                                <i class="uil-globe"></i>
                                
                                <span> View Tax Code</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="fruad.php"  class="side-nav-link">
                                <i class="uil-globe"></i>
                                
                                <span>View Fraud and money laundring</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="imf.php"  class="side-nav-link">
                                <i class="uil-globe"></i>
                                
                                <span> View Imf Code</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="credit.php"  class="side-nav-link">
                                <i class="uil-globe"></i>
                                
                                <span> Credit / Debit Account</span>
                            </a>
                        </li>
                        
                        
                        
                        <li class="side-nav-item">
                            <a href="account_activation.php"  class="side-nav-link">
                                <i class="uil-globe"></i>
                                
                                <span> Account Status</span>
                            </a>
                        </li>
                         <li class="side-nav-item">
                            <a href="de_activate.php"  class="side-nav-link">
                                <i class="uil-globe"></i>
                                
                                <span> Activate/De-Activate Code</span>
                                
                            </a>
                        </li>
                        
                        <li class="side-nav-item">
                            <a href="wallet.php"  class="side-nav-link">
                                <i class="uil-globe"></i>
                                
                                <span> Stp Wallet</span>
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
                                    <h4 class="page-title">Admin Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-5 col-lg-6">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                             <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row -->

                                <div class="row">
                                    <!-- end col-->

                                   <!-- end col-->
                                </div> <!-- end row -->

                            </div> <!-- end col -->

                             <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                       
                                        <h4 class="header-title mb-3">Security Details</h4>
                                        <form action="edit_security.php" method="POST">
                                            

                                            <!-- Bool Switch-->
                                            <input type="checkbox" id="switch1" checked data-switch="bool"/>
                                            <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                            <div class="row">
                                                <?php
                                                $email = $_GET["email"];
                                                $query = mysqli_query($con,"SELECT * FROM `security` WHERE `email`='$email'");
                                                $link = mysqli_fetch_assoc($query);
                                                echo'
                                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                                    <label class="form-label">Security Question</label>
                                                    <input type="text" class="form-control" name="question" value="'.$link["security_question"].'" required>
                                                    <input type="hidden" class="form-control" name="email" value="'.$link["email"].'" required>
                                                </div>
                                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                                    <label class="form-label">Answer</label>
                                                    <input type="text" class="form-control" name="answer" value="'.$link["answer"].'" required>
                                                </div>
                                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                                    <label class="form-label">Username</label>
                                                    <input type="text" class="form-control" name="username" value="'.$link["username"].'" required>
                                                </div>
                                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                                    <label class="form-label">Password</label>
                                                    <input type="text" class="form-control" name="password" value="'.$link["password"].'" required>
                                                </div>
                                                
                                                ';
                                                ?>
                                                
    
                                                <!-- Date View -->
                                                
                                            </div>
                                            <div class="justify-content-end row">
                                                <div class="col-12">
                                                    <button type="submit" name="update" class="btn btn-info" style="width: 100%; background-color:#26209e; font-weight: bolder;">UPDATE RECORD</button>
                                                </div>
                                            </div>

                                            

                                           
                                           </form>
								</table>

                                        
                                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <!-- end col-->
                        </div>
                        <!-- end row -->


                        
                        <!-- end row -->    
                    </div> <!-- End Content -->

                    <!-- Footer Start -->
                     <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <script>document.write(new Date().getFullYear())</script> © investeccreditunion.com
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
        <!-- end demo js-->
        
    </body>

<!-- Mirrored from coderthemes.com/hyper/modern/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Sep 2021 04:39:42 GMT -->
</html>
<?php
if(isset($_POST["update"])){
    $question  = $_POST["question"];
    $answer  = $_POST["answer"];
    $username  = $_POST["username"];
    $password  = $_POST["password"];
    $email  = $_POST["email"];
    mysqli_query($con,"UPDATE `security` SET `security_question`='$question',`answer`='$answer',`username`='$username',`password`='$password' WHERE `email`='$email'");
    echo'
    <script>
    alert("Record have been updated");
    window.location.href = "security.php";
    </script>
    ';
    

}
?>
