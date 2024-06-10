<?php
require_once("inc/connect.php");
require_once("inc/functions.php");
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: admin_login.html");
    exit;
}

$settings = fetch_settings($con);
if (!$settings) {
    echo "Failed to fetch site settings.";
    exit;
}
?>
<?php include('inc/header.php'); ?>

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
        </div> <!-- end row -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">STP Transaction History</h4>
                        <form action="stp_transact_search.php" method="GET">
                            <div class="row">
                                <div class="col-lg-6 mb-3 position-relative" id="datepicker1">
                                    <label class="form-label">Select Email</label>
                                    <select class="form-select" aria-label="Default select example" name="email" required>
                                        <option selected disabled>Select Email</option>
                                        <?php
                                        $stmt = $con->query("SELECT email FROM users");
                                        while ($link_mail = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option>' . $link_mail["email"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="justify-content-end row">
                                <div class="col-12">
                                    <button type="submit" name="transact_search" class="btn btn-info" style="width: 100%; background-color:#26209e; font-weight: bolder;">SEARCH TRANSACTION DETAILS</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
            <!-- end col-->
        </div> <!-- end row -->
    </div> <!-- End Content -->
<?php include('inc/footer.php'); ?>
