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
    if (isset($_POST['add_transaction'])) {
        $email = $_POST['email'];
        $address = $_POST['address'];
        $coin = $_POST['coin'];
        $reason = $_POST['reason'];
        $amount = $_POST['amount'];

        $stmt = $con->prepare("INSERT INTO sttp_transfer (email, address, coin, reason, amount) VALUES (:email, :address, :coin, :reason, :amount)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':coin', $coin);
        $stmt->bindParam(':reason', $reason);
        $stmt->bindParam(':amount', $amount);
        $stmt->execute();

        echo '<script>
        alert("Transaction added successfully");
        window.location.href = "create_stp_transaction.php";
        </script>';
    }
}

// Fetch all transactions
$stmt = $con->query("SELECT * FROM sttp_transfer ORDER BY id DESC");
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch all emails from users table
$email_stmt = $con->query("SELECT email FROM users");
$emails = $email_stmt->fetchAll(PDO::FETCH_ASSOC);
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
                        <h4 class="header-title mb-3">Add STP Transaction</h4>
                        <form action="create_stp_transaction.php" method="POST">
                            <div class="row">
                                <div class="col-lg-6 mb-3 position-relative">
                                    <label class="form-label">Email</label>
                                    <select class="form-select" name="email" required>
                                        <option selected disabled>Select Email</option>
                                        <?php foreach ($emails as $email): ?>
                                            <option value="<?php echo htmlspecialchars($email['email']); ?>"><?php echo htmlspecialchars($email['email']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative">
                                    <label class="form-label">Wallet Address</label>
                                    <input type="text" class="form-control" name="address" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative">
                                    <label class="form-label">Coin</label>
                                    <input type="text" class="form-control" name="coin" required>
                                </div>
                                <div class="col-lg-6 mb-3 position-relative">
                                    <label class="form-label">Amount</label>
                                    <input type="number" step="0.01" class="form-control" name="amount" required>
                                </div>
                                <div class="col-lg-12 mb-3 position-relative">
                                    <label class="form-label">Reason</label>
                                    <textarea class="form-control" name="reason" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="justify-content-end row">
                                <div class="col-12">
                                    <button type="submit" name="add_transaction" class="btn btn-info" style="width: 100%; background-color:#26209e; font-weight: bolder;">Add Transaction</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">STP Transactions</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Wallet Address</th>
                                    <th>Coin</th>
                                    <th>Reason</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($transactions) > 0): ?>
                                    <?php foreach ($transactions as $transaction): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($transaction['email']); ?></td>
                                            <td><?php echo htmlspecialchars($transaction['address']); ?></td>
                                            <td><?php echo htmlspecialchars($transaction['coin']); ?></td>
                                            <td><?php echo htmlspecialchars($transaction['reason']); ?></td>
                                            <td><?php echo htmlspecialchars($transaction['amount']); ?></td>
                                            <td><?php echo htmlspecialchars($transaction['date']); ?></td>
                                            <td class="table-action">
                                                <a href="edit_stp_transaction.php?id=<?php echo $transaction['id']; ?>">Edit</a> |
                                                <a href="delete_stp_transaction.php?id=<?php echo $transaction['id']; ?>" onclick="return confirm('Are you sure you want to delete this transaction?');">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No transactions found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->
    </div> <!-- End Content -->
<?php include('inc/footer.php'); ?>
