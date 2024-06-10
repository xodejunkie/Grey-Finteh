<?php
require_once("inc/connect.php");
require_once("inc/functions.php");
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: admin_login.html");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_transaction'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $coin = $_POST['coin'];
    $reason = $_POST['reason'];
    $amount = $_POST['amount'];

    $stmt = $con->prepare("UPDATE sttp_transfer SET email = :email, address = :address, coin = :coin, reason = :reason, amount = :amount WHERE id = :id");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':coin', $coin);
    $stmt->bindParam(':reason', $reason);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    echo '<script>
    alert("Transaction updated successfully");
    window.location.href = "create_stp_transaction.php";
    </script>';
}

$id = $_GET['id'];
$stmt = $con->prepare("SELECT * FROM sttp_transfer WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$transaction = $stmt->fetch(PDO::FETCH_ASSOC);

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
                        <h4 class="header-title mb-3">Edit STP Transaction</h4>
                        <form action="edit_stp_transaction.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $transaction['id']; ?>">
                            <div class="row">
                                <div class="col-lg-6 mb-3 position-relative">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($transaction['email']); ?>" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative">
                                    <label class="form-label">Wallet Address</label>
                                    <input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($transaction['address']); ?>" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative">
                                    <label class="form-label">Coin</label>
                                    <input type="text" class="form-control" name="coin" value="<?php echo htmlspecialchars($transaction['coin']); ?>" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative">
                                    <label class="form-label">Amount</label>
                                    <input type="number" step="0.01" class="form-control" name="amount" value="<?php echo htmlspecialchars($transaction['amount']); ?>" required>
                                </div>
                                <div class="col-lg-12 mb-3 position-relative">
                                    <label class="form-label">Reason</label>
                                    <textarea class="form-control" name="reason" rows="3" required><?php echo htmlspecialchars($transaction['reason']); ?></textarea>
                                </div>
                            </div>
                            <div class="justify-content-end row">
                                <div class="col-12">
                                    <button type="submit" name="update_transaction" class="btn btn-info" style="width: 100%; background-color:#26209e; font-weight: bolder;">Update Transaction</button>
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
