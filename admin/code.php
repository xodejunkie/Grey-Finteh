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

function generateRandomCode($length = 6) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST["email"];
    $code = isset($_POST["code"]) && !empty($_POST["code"]) ? $_POST["code"] : generateRandomCode();
    
    if (isset($_POST["imf"])) {
        $message = insertCode($con, $email, $code, 'imf');
    } elseif (isset($_POST["tax"])) {
        $message = insertCode($con, $email, $code, 'tax');
    } elseif (isset($_POST["cot"])) {
        $message = insertCode($con, $email, $code, 'tac');
    } elseif (isset($_POST["fraud"])) {
        $message = insertCode($con, $email, $code, 'fraud');
    }

    echo '<script>
        alert("' . $message . '");
        window.location.href = "code.php";
    </script>';
}

function insertCode($con, $email, $code, $column) {
    $stmt = $con->prepare("UPDATE users SET $column = :code WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':code', $code);
    if ($stmt->execute()) {
        return strtoupper(str_replace('_', ' ', $column)) . " code is now active";
    } else {
        return "Failed to activate " . strtoupper(str_replace('_', ' ', $column)) . " code";
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
        </div> <!-- end row -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Generate Code</h4>
                        <form action="code.php" method="POST">
                            <div class="row">
                                <div class="col-lg-6 mb-3 position-relative" id="datepicker1">
                                    <label class="form-label">Select Email</label>
                                    <select class="form-select" aria-label="Default select example" name="email" required>
                                        <option selected>Select Email</option>
                                        <?php
                                        $query = $con->query("SELECT email FROM users");
                                        while ($link_mail = $query->fetch(PDO::FETCH_ASSOC)) {
                                            echo'<option>'.$link_mail["email"].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                    <label class="form-label">Enter Code (optional)</label>
                                    <input type="text" class="form-control" name="code">
                                </div>
                            </div>
                            <div class="justify-content-end row">
                                <div class="col-12">
                                    <button type="submit" name="cot" class="btn btn-info" style="width: 100%; background-color:#26209e; font-weight: bolder;">Transfer processing code</button>
                                </div>
                            </div>
                            <div class="justify-content-end row">
                                <div class="col-12">
                                    <button type="submit" name="tax" class="btn btn-info" style="width: 100%; background-color:#26209e; font-weight: bolder;">TAX</button>
                                </div>
                            </div>
                            <div class="justify-content-end row">
                                <div class="col-12">
                                    <button type="submit" name="fraud" class="btn btn-info" style="width: 100%; background-color:#26209e; font-weight: bolder;">Fraud and money laundering</button>
                                </div>
                            </div>
                            <div class="justify-content-end row">
                                <div class="col-12">
                                    <button type="submit" name="imf" class="btn btn-info" style="width: 100%; background-color:#26209e; font-weight: bolder;">IMF</button>
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
