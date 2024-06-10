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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["update"])) {
    $account_name  = $_POST["account_name"];
    $deposite  = $_POST["deposite"];
    $account_type  = $_POST["account_type"];
    $currency  = $_POST["currency"];
    $account_number  = $_POST["account_number"];
    $email  = $_POST["email"];
    $active = $_POST["active"] == "Approve" ? '1' : '0';

    $stmt = $con->prepare("UPDATE `users` SET `fullname` = :account_name, `acctbal` = :deposite, `accttype` = :account_type, `currency` = :currency, `acctnumber` = :account_number, `verified` = :active WHERE `email` = :email");
    $stmt->bindParam(':account_name', $account_name);
    $stmt->bindParam(':deposite', $deposite);
    $stmt->bindParam(':account_type', $account_type);
    $stmt->bindParam(':currency', $currency);
    $stmt->bindParam(':account_number', $account_number);
    $stmt->bindParam(':active', $active);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        echo '<script>
        alert("Record has been updated");
        window.location.href = "account.php";
        </script>';
    } else {
        echo '<script>
        alert("Failed to update record");
        window.location.href = "account.php";
        </script>';
    }
}

if (!isset($_GET["email"])) {
    echo '<script>
    alert("Email parameter is missing");
    window.location.href = "account.php";
    </script>';
    exit;
}

$email = $_GET["email"];
$query = $con->prepare("SELECT * FROM `users` WHERE `email` = :email");
$query->bindParam(':email', $email);
$query->execute();
$link = $query->fetch(PDO::FETCH_ASSOC);

if (!$link) {
    echo '<script>
    alert("No user found with the provided email");
    window.location.href = "account.php";
    </script>';
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
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Account Details</h4>
                        <form action="edit_account.php" method="POST">
                            <!-- Bool Switch-->
                            <input type="checkbox" id="switch1" checked data-switch="bool"/>
                            <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                            <div class="row">
                                <?php
                                echo '
                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                    <label class="form-label">Account Name</label>
                                    <input type="text" class="form-control" name="account_name" value="' . htmlspecialchars($link["fullname"]) . '" required>
                                    <input type="hidden" class="form-control" name="email" value="' . htmlspecialchars($link["email"]) . '" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                    <label class="form-label">Deposite</label>
                                    <input type="text" class="form-control" name="deposite" value="' . htmlspecialchars($link["acctbal"]) . '" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                    <label class="form-label">Account Type</label>
                                    <input type="text" class="form-control" name="account_type" value="' . htmlspecialchars($link["accttype"]) . '" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                    <label class="form-label">Currency</label>
                                    <select class="form-control" name="currency" required>
                                        <option value="USD" ' . ($link["currency"] == "USD" ? "selected" : "") . '>USD</option>
                                        <option value="EUR" ' . ($link["currency"] == "EUR" ? "selected" : "") . '>EUR</option>
                                        <option value="GBP" ' . ($link["currency"] == "GBP" ? "selected" : "") . '>GBP</option>
                                        <option value="JPY" ' . ($link["currency"] == "JPY" ? "selected" : "") . '>JPY</option>
                                        <option value="AUD" ' . ($link["currency"] == "AUD" ? "selected" : "") . '>AUD</option>
                                        <option value="CAD" ' . ($link["currency"] == "CAD" ? "selected" : "") . '>CAD</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                    <label class="form-label">Account Number</label>
                                    <input type="text" class="form-control" name="account_number" value="' . htmlspecialchars($link["acctnumber"]) . '" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                    <label class="form-label">Account Activation</label>
                                    <select class="form-control" name="active">
                                        <option value="0" ' . ($link["verified"] == "0" ? "selected" : "") . '>Pending</option>
                                        <option value="1" ' . ($link["verified"] == "1" ? "selected" : "") . '>Approve</option>
                                    </select>
                                </div>';
                                ?>
                            </div>
                            <div class="justify-content-end row">
                                <div class="col-12">
                                    <button type="submit" name="update" class="btn btn-info" style="width: 100%; background-color:#26209e; font-weight: bolder;">UPDATE RECORD</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->
    </div> <!-- End Content -->

<?php include('inc/footer.php'); ?>
