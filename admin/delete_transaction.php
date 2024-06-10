<?php
require("inc/connect.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    $stmt = $con->prepare("DELETE FROM `transaction` WHERE `id` = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    echo '
    <script>
    alert("Record has been deleted");
    window.location.href = "trasaction.php";
    </script>
    ';
} else {
    echo '
    <script>
    alert("No record selected for deletion");
    window.location.href = "trasaction.php";
    </script>
    ';
}
