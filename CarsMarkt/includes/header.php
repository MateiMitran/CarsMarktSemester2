<?php
    // AUTOLOAD REQUIRED CLASSES
    spl_autoload_register(function($class) {
        include('./classes/' . $class . '.php');
    });
    
    require_once('initialize.php');

    // INCLUDE REQUIRED FUNCTIONALITY FILES
    require_once('functionality/logout-functionality.php');

    if(!empty($functionalityRequirements)) {
        foreach($functionalityRequirements as $functionality) {
            require_once('functionality/' . $functionality . '.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarsMarkt: <?php echo $pageTitle; ?></title>
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- CSS IMPORTS -->
    <link rel="stylesheet" href="css/essentials.css" type="text/css">
    <?php foreach($requiredCSS as $css) { ?>
        <link rel="stylesheet" href="css/<?php echo $css; ?>" type="text/css">
    <?php } ?>
</head>
<body>
<!-- BODY WRAPPER -->
<div id="body-wrapper">
    <!-- ERROR MESSAGES -->
    <div id="messages-container">
        <ul id="success-messages">
            <?php 
                if(!empty($_SESSION['successMessages'])) {
                    foreach($_SESSION['successMessages'] as $message) {
            ?>
                    <li>
                        <p><?php echo $message; ?></p>
                        <i><ion-icon name="close-outline"></ion-icon></i>
                    </li>
            <?php
                    }
                    $_SESSION['successMessages'] = [];
                }
            ?>
        </ul>
        <ul id="error-messages">
            <?php 
                if(!empty($_SESSION['errorMessages'])) {
                    foreach($_SESSION['errorMessages'] as $message) {
            ?>
                    <li>
                        <p><?php echo $message; ?></p>
                        <i><ion-icon name="close-outline"></ion-icon></i>
                    </li>
            <?php
                    }
                    $_SESSION['errorMessages'] = [];
                }
            ?>
        </ul>
    </div>
    <!-- TOP NAV -->
    <?php if($page != 'index' && $page != 'login' && $page != 'register' && $page != 'admin-home' && $page !='admin-account-preferences' && $page != 'create-admin') { ?>
        <nav id="top-nav">
            <a href="/" id="logo"><span>Cars</span>Markt</a>
            <!-- LOGGED IN NAV LINKS -->
            <ul>
                <li>
                    <a href="/buy-car">Buy a Car</a>
                </li>
                <li>
                    <a href="/create-listing">Sell Your Car</a>
                </li>
                <li>
                    <a href="/account-preferences">Account</a>
                </li>
                <li>
                    <form method="POST">
                        <input type="submit" name="logout" id="top-nav-sign-out-button" value="Sign Out">
                    </form>
                </li>
            </ul>
            <i id="top-nav-ham-menu">
                <ion-icon name="menu"></ion-icon>
            </i>
        </nav>
    <?php } ?>