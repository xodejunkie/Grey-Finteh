<?php
require_once("inc/connect.php");

if (isset($_GET["id"]) && isset($_GET["type"])) {
    $id = $_GET["id"];
    $type = $_GET["type"];

    $valid_types = ['cot', 'imf', 'tax', 'fraud'];

    if (in_array($type, $valid_types)) {
        $column_name = '';
        switch ($type) {
            case 'cot':
                $column_name = 'tac';
                break;
            case 'imf':
                $column_name = 'imf';
                break;
            case 'tax':
                $column_name = 'tax';
                break;
            case 'fraud':
                $column_name = 'fraud';
                break;
        }

        if ($column_name) {
            try {
                $stmt = $con->prepare("UPDATE `users` SET `$column_name` = 0 WHERE `id` = :id");
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();

                echo '<script>
                alert("Record has been deleted");
                window.location.href = "'.$type.'.php";
                </script>';
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        } else {
            echo '<script>
            alert("Invalid type provided");
            window.location.href = "index.php";
            </script>';
        }
    } else {
        echo '<script>
        alert("Invalid type provided");
        window.location.href = "index.php";
        </script>';
    }
} else {
    echo '<script>
    alert("Required parameters not provided");
    window.location.href = "index.php";
    </script>';
}
