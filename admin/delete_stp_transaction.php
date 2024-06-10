<?php
require_once("inc/connect.php");
require_once("inc/functions.php");
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: admin_login.html");
    exit;
}

$id = $_GET['id'];
$stmt = $con->prepare("DELETE FROM sttp_transfer WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

echo '<script>
alert("Transaction deleted successfully");
window.location.href = "create_stp_transaction.php";
</script>';
