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

if (isset($_POST["credit"])) {
    $amount = round($_POST["amount"], 3);
    $email = $_POST["email"];
    $date = $_POST["date"];
    $naration = $_POST["naration"];
    $status = $_POST["status"];

    if (credit_account($con, $email, $amount, $date, $naration, $status)) {
        echo '<script>
            alert("Account has been credited successfully.");
            window.location.href = "credit.php";
        </script>';
    } else {
        echo '<script>
            alert("Failed to credit the account.");
            window.location.href = "credit.php";
        </script>';
    }
}

if (isset($_POST["debit"])) {
    $amount = round($_POST["amount"], 3);
    $email = $_POST["email"];
    $date = $_POST["date"];
    $naration = $_POST["naration"];
    $status = $_POST["status"];

    if (debit_account($con, $email, $amount, $date, $naration, $status)) {
        echo '<script>
            alert("Account has been debited successfully.");
            window.location.href = "credit.php";
        </script>';
    } else {
        echo '<script>
            alert("Failed to debit the account.");
            window.location.href = "credit.php";
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
        </div> <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Credit/Debit Account</h4>
                        <form action="credit.php" method="POST">
                            <div class="row">
                                <div class="col-lg-6 mb-3 position-relative">
                                    <label class="form-label">Select Email</label>
                                    <select class="form-select" aria-label="Default select example" name="email" required>
                                        <option selected disabled>Select Email</option>
                                        <?php
                                        $query = $con->query("SELECT email FROM users");
                                        while ($link_mail = $query->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option>' . $link_mail["email"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-lg-6 mb-3 position-relative">
                                    <label class="form-label">Enter Amount</label>
                                    <input type="number" step="0.001" class="form-control" name="amount" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative">
                                    <label class="form-label">Enter Date and Time</label>
                                    <input type="datetime-local" class="form-control" name="date" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative">
                                    <label class="form-label">Enter Naration</label>
                                    <input type="text" class="form-control" name="naration" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative">
                                    <label class="form-label">Enter Action</label>
                                    <input type="text" class="form-control" name="action" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative">
                                    <label class="form-label">Select Status</label>
                                    <select class="form-select" name="status" required>
                                        <option value="pending">Pending</option>
                                        <option value="failed">Failed</option>
                                        <option value="successful">Successful</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-6">
                                    <button type="submit" name="credit" class="btn btn-success" style="width: 100%; font-weight: bolder;">CREDIT ACCOUNT</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" name="debit" class="btn btn-danger" style="width: 100%; font-weight: bolder;">DEBIT ACCOUNT</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->

    </div> <!-- End Content -->
</div>

<?php include('inc/footer.php'); ?>
