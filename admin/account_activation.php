<?php
require("inc/connect.php");
require("inc/functions.php");
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

if (isset($_POST["proceed"])) {
    $email = $_POST["email"];
    $status = $_POST["status"];
    
    if (update_account_status($con, $email, $status)) {
        echo '<script>
            alert("Process complete successful");
            window.location.href = "index.php";
        </script>';
    } else {
        echo '<script>
            alert("Failed to update account status");
        </script>';
    }
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
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                       
                                        <h4 class="header-title mb-3">Account Status</h4>
                                        <form action="account_activation.php" method="POST">
                                            

                                            <!-- Bool Switch-->
                                            <input type="checkbox" id="switch1" checked data-switch="bool"/>
                                            <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                            <div class="row">
                                                <div class="col-lg-6 mb-3 position-relative" id="datepicker1">
                                                    <label class="form-label">Select Email</label>
                                                    <select class="form-select" aria-label="Default select example" name="email">
                                                        <option selected>Select Email</option>
                                                        <?php
                                                            $query = $con->query("SELECT email FROM users");
                                                            while($link_mail = $query->fetch(PDO::FETCH_ASSOC)){
                                                                echo'<option>'.$link_mail["email"].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-lg-6 mb-3 position-relative" id="datepicker1">
                                                    <label class="form-label">Select Status</label>
                                                    <select class="form-select" aria-label="Default select example" name="status">
                                                        <option selected>Choose option</option>
                                                        <option>DORMANT</option>
                                                        <option>IN-ACTIVE</option>
                                                        <option>ACTIVE</option>
                                                        
                                                    </select>
                                                </div>
    
                                                <!-- Date View -->
                                               
                                            <div class="justify-content-end row">
                                                <div class="col-12">
                                                    <button type="submit" name="proceed" class="btn btn-info" style="width: 100%; background-color:#26209e; font-weight: bolder;">Proceed</button>
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

<?php include('inc/footer.php'); ?>
