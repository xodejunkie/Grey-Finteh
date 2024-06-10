<?php
require("inc/connect.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $stmt = $con->prepare("UPDATE `transaction` SET `status` = :status WHERE `id` = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':status', $status);
    $stmt->execute();

    echo '
    <script>
    alert("Transaction status updated successfully");
    window.location.href = "trasaction.php";
    </script>
    ';
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $con->prepare("SELECT * FROM `transaction` WHERE `id` = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $transaction = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Transaction</title>
    <link href="assets/css/app-modern.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container">
        <h2>Edit Transaction Status</h2>
        <form action="edit_transaction.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $transaction['id']; ?>">
            <div class="mb-3">
                <label for="status" class="form-label">Transaction Status</label>
                <select name="status" class="form-select" required>
                    <option value="pending" <?php echo $transaction['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                    <option value="failed" <?php echo $transaction['status'] == 'failed' ? 'selected' : ''; ?>>Failed</option>
                    <option value="successful" <?php echo $transaction['status'] == 'successful' ? 'selected' : ''; ?>>Successful</option>
                </select>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
