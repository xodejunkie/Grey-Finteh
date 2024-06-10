<?php
require("inc/connect.php");
$email = $_GET["email"];

// Prepare the SQL statement
$stmt = $con->prepare("UPDATE `users` SET `username` = '', `password` = '' WHERE `email` = :email");
$stmt->bindParam(':email', $email);

// Execute the statement and check if it was successful
if ($stmt->execute()) {
    echo '<script>
    alert("Username and password have been emptied");
    window.location.href = "security.php";
    </script>';
} else {
    echo '<script>
    alert("Failed to update the record");
    window.location.href = "security.php";
    </script>';
}
