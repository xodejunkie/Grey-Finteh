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
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                       
                        <h4 class="header-title mb-3">Transaction history</h4>
                        <table class="table">
                    <thead>
                        <tr>
                            <th style="width:14.28%;">Date</th>
                            <th style="width:14.28%;">Type</th>
                            <th style="width:14.28%;">Amount</th>
                            <th style="width:14.28%;">Narrative</th>
                            <th style="width:14.28%;">Status</th>
                            <th style="width:14.28%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET["email"])) {
                            $email = $_GET["email"];
                            $query = $con->prepare("SELECT t.date, t.type, t.amount, t.description, t.status, t.id FROM transaction t INNER JOIN users u ON t.username = u.username WHERE u.email = :email ORDER BY t.id DESC");
                            $query->bindParam(':email', $email);
                            $query->execute();

                            while ($link = $query->fetch(PDO::FETCH_ASSOC)) {
                                echo'
                                <tr>
                                <td>'.$link["date"].'</td>
                                <td>'.$link["type"].'</td>
                                <td>'.$link["amount"].'</td>
                                <td>'.$link["description"].'</td>
                                <td>'.$link["status"].'</td>
                                <td class="table-action">
                                    <a href="delete_transaction.php?id='.$link["id"].'">Delete</a>
                                    <a href="edit_transaction.php?id='.$link["id"].'">Edit</a>
                                </td>
                            </tr>
                                ';
                            }
                        }
                        ?>
                    </tbody>
                </table>

                        
                        
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <!-- end col-->
        </div> <!-- end row -->
        <!-- end row -->    
    </div> <!-- End Content -->


<?php include('inc/footer.php'); ?>
