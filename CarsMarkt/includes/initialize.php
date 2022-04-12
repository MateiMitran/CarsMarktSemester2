<?php

    // START SESSION
    session_start();

    // INCLUDE HELPER METHODS AND REDIRECT FUNCTIONALITY
    require_once('helper-methods.php');
    include('functionality/route-redirect-functionality.php');

    // SET UP SUCCESS / ERROR MESSAGES
    if(!isset($_SESSION['successMessages'])) {
        $_SESSION['successMessages'] = [];
    }

    if(!isset($_SESSION['errorMessages'])) {
        $_SESSION['errorMessages'] = [];
    }
