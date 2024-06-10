<?php
require("inc/connect.php");

$id = $_GET["id"];

$stmt = $con->prepare("DELETE FROM `sttp_transfer` WHERE `id` = :id");
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    echo '<script>
    alert("Record has been deleted");
    window.location.href = "stp_transaction.php";
    </script>';
} else {
    echo '<script>
    alert("Failed to delete the record");
    window.location.href = "stp_transaction.php";
    </script>';
}
