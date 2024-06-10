<?php
require("connect.php");
session_start();

$response = ['success' => false, 'message' => ''];

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $stmt = $con->prepare("SELECT * FROM admin WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $password === $user['password']) { // Direct comparison of plain text password
            $_SESSION['username'] = $user['username'];
            $response['success'] = true;
            $response['message'] = 'Login successful!';
        } else {
            $response['message'] = 'Invalid username or password.';
        }
    } catch (PDOException $e) {
        $response['message'] = 'Error: ' . $e->getMessage();
    }
} else {
    $response['message'] = 'Please fill in both fields.';
}

header('Content-Type: application/json');
echo json_encode($response);
