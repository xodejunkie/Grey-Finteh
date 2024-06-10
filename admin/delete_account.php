<?php
require("inc/connect.php");

if (isset($_GET["email"])) {
    $email = $_GET["email"];

    $stmt = $con->prepare("DELETE FROM `users` WHERE `email` = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    echo '
    <script>
    alert("Record has been deleted");
    window.location.href = "account.php";
    </script>
    ';
} else {
    echo '
    <script>
    alert("No record selected for deletion");
    window.location.href = "account.php";
    </script>
    ';
}
