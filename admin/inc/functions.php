<?php
require_once("connect.php");

// Fetching the settings
function fetch_settings($con) {
    try {
        $stmt = $con->prepare("SELECT site_name, site_description, live_chat_code, address, support_mail, site_url FROM settings");
        $stmt->execute();
        $settings = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($settings) {
            return $settings;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}

// Updating account status
function update_account_status($con, $email, $status) {
    $stmt = $con->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        $stmt = $con->prepare("UPDATE users SET status = :status WHERE email = :email");
        $stmt->execute(['status' => $status, 'email' => $email]);
    } else {
        $stmt = $con->prepare("INSERT INTO users (email, status) VALUES (:email, :status)");
        $stmt->execute(['email' => $email, 'status' => $status]);
    }

    return $stmt->rowCount() > 0;
}

// Credit account and update user balance
function credit_account($con, $email, $amount, $date, $naration, $status) {
    $formatted_date = date("Y-m-d H:i:s", strtotime($date));

    $query = $con->prepare("SELECT acctbal, username FROM users WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $db_amount = $result["acctbal"];
        $total = $db_amount + $amount;
        $username = $result["username"];

        // Update account balance
        $update = $con->prepare("UPDATE users SET acctbal = :total WHERE email = :email");
        $update->bindParam(':total', $total);
        $update->bindParam(':email', $email);
        $update->execute();

        // Insert transaction record
        $insert = $con->prepare("INSERT INTO transaction (username, description, amount, type, status, date) VALUES (:username, :naration, :amount, 'CREDIT', :status, :date)");
        $insert->bindParam(':username', $username);
        $insert->bindParam(':naration', $naration);
        $insert->bindParam(':amount', $amount);
        $insert->bindParam(':status', $status);
        $insert->bindParam(':date', $formatted_date);
        $insert->execute();

        return true;
    }

    return false;
}

// Debit account and update user balance
function debit_account($con, $email, $amount, $date, $naration, $status) {
    $formatted_date = date("Y-m-d H:i:s", strtotime($date));

    $query = $con->prepare("SELECT acctbal, username FROM users WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $db_amount = $result["acctbal"];
        $total = $db_amount - $amount;
        $username = $result["username"];

        // Update account balance
        $update = $con->prepare("UPDATE users SET acctbal = :total WHERE email = :email");
        $update->bindParam(':total', $total);
        $update->bindParam(':email', $email);
        $update->execute();

        // Insert transaction record
        $insert = $con->prepare("INSERT INTO transaction (username, description, amount, type, status, date) VALUES (:username, :naration, :amount, 'DEBIT', :status, :date)");
        $insert->bindParam(':username', $username);
        $insert->bindParam(':naration', $naration);
        $insert->bindParam(':amount', $amount);
        $insert->bindParam(':status', $status);
        $insert->bindParam(':date', $formatted_date);
        $insert->execute();

        return true;
    }

    return false;
}

// Activate and Deactivate
function updateCodeStatus($con, $email, $status) {
    $query = $con->prepare("SELECT * FROM `users` WHERE `email` = :email");
    $query->bindParam(':email', $email);
    $query->execute();
    $link = $query->rowCount();
    
    if ($link > 0) {
        $update = $con->prepare("UPDATE `users` SET `code_active` = :status WHERE `email` = :email");
        $update->bindParam(':status', $status);
        $update->bindParam(':email', $email);
        $update->execute();
    } else {
        $insert = $con->prepare("INSERT INTO `users`(`email`, `code_active`) VALUES (:email, :status)");
        $insert->bindParam(':email', $email);
        $insert->bindParam(':status', $status);
        $insert->execute();
    }

    return $status == '1' ? "code is now active" : "code is now de-active";
}
