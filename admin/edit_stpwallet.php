<?php
require_once("inc/connect.php");
require_once("inc/functions.php");
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: admin_login.html");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_wallet'])) {
    $id = $_POST['id'];
    $wallet_chain = $_POST['wallet_chain'];
    $address = $_POST['address'];
    $coin = $_POST['coin'];
    $network = $_POST['network'];
    $description = $_POST['description'];

    $stmt = $con->prepare("UPDATE stp_wallets SET wallet_chain = :wallet_chain, address = :address, coin = :coin, network = :network, description = :description WHERE id = :id");
    $stmt->bindParam(':wallet_chain', $wallet_chain);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':coin', $coin);
    $stmt->bindParam(':network', $network);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    echo '<script>
    alert("Wallet updated successfully");
    window.location.href = "wallet.php";
    </script>';
}

$id = $_GET['id'];
$stmt = $con->prepare("SELECT * FROM stp_wallets WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$wallet = $stmt->fetch(PDO::FETCH_ASSOC);

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
                        <h4 class="header-title mb-3">Edit Wallet</h4>
                        <form action="edit_stpwallet.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $wallet['id']; ?>">
                            <div class="row">
                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                    <label class="form-label">Wallet Chain</label>
                                    <input type="text" class="form-control" name="wallet_chain" value="<?php echo htmlspecialchars($wallet['wallet_chain']); ?>" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                    <label class="form-label">Wallet Address</label>
                                    <input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($wallet['address']); ?>" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                    <label class="form-label">Coin</label>
                                    <input type="text" class="form-control" name="coin" value="<?php echo htmlspecialchars($wallet['coin']); ?>" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                    <label class="form-label">Network</label>
                                    <input type="text" class="form-control" name="network" value="<?php echo htmlspecialchars($wallet['network']); ?>" required>
                                </div>
                                <div class="col-lg-12 mb-3 position-relative" id="datepicker2">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="3"><?php echo htmlspecialchars($wallet['description']); ?></textarea>
                                </div>
                            </div>
                            <div class="justify-content-end row">
                                <div class="col-12">
                                    <button type="submit" name="update_wallet" class="btn btn-info" style="width: 100%; background-color:#26209e; font-weight: bolder;">Update Wallet</button>
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
