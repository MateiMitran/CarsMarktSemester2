<?php
$_SESSION['successMessages'] = [];
$_SESSION['errorMessages'] = [];
// ADD SUCCESS MESSAGE
function successMessage($message) {
    $_SESSION['successMessages'][] = $message;
}

// ADD ERROR MESSAGE
function errorMessage($message) {
    $_SESSION['errorMessages'][] = $message;
}

// REDIRECT TO GIVEN PAGE
function redirect_to($path) {
    header("Location: " . $path);
    exit();
}