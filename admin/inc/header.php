<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php echo $settings['site_name']; ?> | Admin Centre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="<?php echo $settings['site_description']; ?>" name="description" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../admin/assets/images/logo-light.png">

    <!-- third party css -->
    <link href="../admin/assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="../admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../admin/assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="../admin/assets/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
</head>

<body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Topbar Start -->
    <div class="navbar-custom topnav-navbar" style="background-color: #26209e;">
        <div class="container-fluid">
            <!-- LOGO -->
            <a href="index.php" class="topnav-logo">
                <span class="topnav-logo-lg">
                    <img src="../admin/assets/images/logo-light.png" alt="" style="height:50px;">
                </span>
                <span class="topnav-logo-sm">
                    <img src="../admin/assets/images/logo_sm.png" alt="" style="height:50px;">
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
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
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
            <div class="app-search dropdown"></div>
        </div>
    </div>
    <!-- end Topbar -->

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu leftside-menu-detached">
                <div class="leftbar-user"></div>

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
                        <a data-bs-toggle="collapse" href="#sidebarUsers" aria-expanded="false" aria-controls="sidebarUsers" class="side-nav-link">
                            <i class="uil-users-alt"></i>
                            <span> Users </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarUsers">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="details.php">Contact Details</a>
                                </li>
                                <li>
                                    <a href="security.php">Security</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarAccount" aria-expanded="false" aria-controls="sidebarAccount" class="side-nav-link">
                            <i class="uil-wallet"></i>
                            <span> Account </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarAccount">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="account.php">Account</a>
                                </li>
                                <li>
                                    <a href="account_activation.php">Account Status</a>
                                </li>
                                <li>
                                    <a href="credit.php">Credit / Debit Account</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarCodes" aria-expanded="false" aria-controls="sidebarCodes" class="side-nav-link">
                            <i class="uil-dialpad"></i>
                            <span> Codes </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCodes">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="code.php">Generate Code</a>
                                </li>
                                <li>
                                    <a href="cot.php">View Transfer Process Codes</a>
                                </li>
                                <li>
                                    <a href="tax.php">View Tax Codes</a>
                                </li>
                                <li>
                                    <a href="fraud.php">View AntiMoney Laundering Codes</a>
                                </li>
                                <li>
                                    <a href="imf.php">View Imf Codes</a>
                                </li>
                                <li>
                                    <a href="de_activate.php"> UserCodes Status</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                        <a href="trasaction.php" class="side-nav-link">
                            <i class="uil-comments-alt"></i>
                            <span> Transaction History </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarSTP" aria-expanded="false" aria-controls="sidebarSTP" class="side-nav-link">
                            <i class="uil-cog"></i>
                            <span> STP Settings </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarSTP">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="stp_transaction.php">STP Transaction History</a>
                                </li>
                                <li>
                                    <a href="wallet.php">STP Wallet</a>
                                </li>
                                <li>
                                    <a href="create_stp_transaction.php">Create STP Transaction</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <!-- End Sidebar -->
                <div class="clearfix"></div>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->
