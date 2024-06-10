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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_wallet'])) {
        $wallet_chain = $_POST['wallet_chain'];
        $address = $_POST['address'];
        $coin = $_POST['coin'];
        $network = $_POST['network'];
        $description = $_POST['description'];

        $stmt = $con->prepare("INSERT INTO stp_wallets (wallet_chain, address, coin, network, description) VALUES (:wallet_chain, :address, :coin, :network, :description)");
        $stmt->bindParam(':wallet_chain', $wallet_chain);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':coin', $coin);
        $stmt->bindParam(':network', $network);
        $stmt->bindParam(':description', $description);
        $stmt->execute();

        echo '<script>
        alert("Wallet added successfully");
        window.location.href = "wallet.php";
        </script>';
    } elseif (isset($_POST['update_wallet'])) {
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
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $stmt = $con->prepare("DELETE FROM stp_wallets WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    echo '<script>
    alert("Wallet deleted successfully");
    window.location.href = "wallet.php";
    </script>';
}

// Fetch all wallets
$stmt = $con->query("SELECT * FROM stp_wallets");
$wallets = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
                        <h4 class="header-title mb-3">Add Wallet</h4>
                        <form action="wallet.php" method="POST">
                            <div class="row">
                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                    <label class="form-label">Wallet Chain</label>
                                    <input type="text" class="form-control" name="wallet_chain" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                    <label class="form-label">Wallet Address</label>
                                    <input type="text" class="form-control" name="address" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                    <label class="form-label">Coin</label>
                                    <input type="text" class="form-control" name="coin" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative" id="datepicker2">
                                    <label class="form-label">Network</label>
                                    <input type="text" class="form-control" name="network" required>
                                </div>
                                <div class="col-lg-12 mb-3 position-relative" id="datepicker2">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="justify-content-end row">
                                <div class="col-12">
                                    <button type="submit" name="add_wallet" class="btn btn-info" style="width: 100%; background-color:#26209e; font-weight: bolder;">Add Wallet</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Wallets</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Wallet Chain</th>
                                    <th>Address</th>
                                    <th>Coin</th>
                                    <th>Network</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($wallets as $wallet): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($wallet["wallet_chain"]); ?></td>
                                        <td><?php echo htmlspecialchars($wallet["address"]); ?></td>
                                        <td><?php echo htmlspecialchars($wallet["coin"]); ?></td>
                                        <td><?php echo htmlspecialchars($wallet["network"]); ?></td>
                                        <td><?php echo htmlspecialchars($wallet["description"]); ?></td>
                                        <td class="table-action">
                                            <a href="edit_stpwallet.php?id=<?php echo $wallet['id']; ?>">Edit</a> |
                                            <a href="wallet.php?delete_id=<?php echo $wallet['id']; ?>" onclick="return confirm('Are you sure you want to delete this wallet?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->
    </div> <!-- End Content -->
<?php include('inc/footer.php'); ?>
