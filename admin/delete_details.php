<?php
require_once("inc/connect.php");

if (isset($_GET["email"])) {
    $email = $_GET["email"];

    try {
        $stmt = $con->prepare("DELETE FROM `users` WHERE `email` = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        echo '
        <script>
        alert("Record has been deleted");
        window.location.href = "details.php";
        </script>
        ';
    } catch (PDOException $e) {
        echo '
        <script>
        alert("An error occurred: ' . $e->getMessage() . '");
        window.location.href = "details.php";
        </script>
        ';
    }
} else {
    echo '
    <script>
    alert("Email parameter is missing");
    window.location.href = "details.php";
    </script>
    ';
}
