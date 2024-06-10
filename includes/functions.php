<?php
require_once("connect.php");

// Fetching the settings
function fetch_settings($con) {
    try {
        $stmt = $con->prepare("SELECT site_name, site_description, live_chat_code, address, support_mail, support_number, smtp_server, site_url, logo, favicon, footer_logo, smtp_user, smtp_pass, email_logo, email_signature FROM settings WHERE id = 1");
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
