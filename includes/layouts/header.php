<?php
require_once("includes/connect.php");
require_once("includes/functions.php");

$settings = fetch_settings($con);
if (!$settings) {
    echo "Failed to fetch site settings.";
    exit;
}

// Provide default values for missing settings
$site_name = htmlspecialchars($settings['site_name'] ?? 'Default Site Name');
$site_description = htmlspecialchars($settings['site_description'] ?? 'Default Site Description');
$live_chat_code = $settings['live_chat_code'] ?? '';
$support_number = htmlspecialchars($settings['support_number'] ?? '000-000-0000');
$support_mail = htmlspecialchars($settings['support_mail'] ?? 'support@example.com');
$logo = $settings['logo'] ?? 'img/core-img/default-logo.png'; // Use the correct relative path from DB
$favicon = $settings['favicon'] ?? 'img/core-img/default-favicon.png'; // Use the correct relative path from DB
$footer_logo = $settings['footer_logo'] ?? 'img/core-img/default-footer-logo.png'; // Use the correct relative path from DB
$address = htmlspecialchars($settings['address'] ?? 'Default Address');
$site_url = htmlspecialchars($settings['site_url'] ?? 'http://example.com');

// Debug output to verify image paths
// echo '<!-- Debug: ' . htmlspecialchars(json_encode($settings)) . ' -->';
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $site_description; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $site_name; ?></title>
    <link rel="icon" href="<?php echo $favicon; ?>"> <!-- Use the correct path from DB -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body class="light-version">
    <div id="preloader">
        <div class="preload-content">
            <div id="loader-load"></div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-white fixed-top" id="banner">
        <div class="container">
            <a class="navbar-brand" href="/"><span><img src="<?php echo $logo; ?>" alt="logo"></span> <?php echo $site_name; ?></a> <!-- Use the correct path from DB -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about-us.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact</a></li>
                    <li>
                        <a href="#"><div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script></a>
                    </li>
                    <li class="lh-55px"><a href="login/index.html" class="btn login-btn ml-50">Login!</a></li>
                </ul>
            </div>
        </div>
    </nav>
