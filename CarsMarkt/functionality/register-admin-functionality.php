<?php

if(isset($_POST['submit'])) {
    $firstName = false;
    $lastName = false;
    $email = false;
    $password = false;
    $confirmPassword = false;
    $phone = false;

    // CHECK FOR CORRECT USER INPUT AND ASSIGN VALUES TO VARIABLES IF INPUT IS CORRECT
    if(isset($_POST['first-name']) && !empty(trim($_POST['first-name']))) {
        $firstName = trim($_POST['first-name']);
    } else {
        errorMessage('Please enter your first name');
    }

    if(isset($_POST['last-name']) && !empty(trim($_POST['last-name']))) {
        $lastName = trim($_POST['last-name']);
    } else {
        errorMessage('Please enter your last name');
    }

    if(isset($_POST['email']) && !empty(trim($_POST['email']))) {
        $email = trim($_POST['email']);
    } else {
        errorMessage('Please enter your email address');
    }

    if(isset($_POST['password']) && !empty(trim($_POST['password']))) {
        $password = $_POST['password'];
    } else {
        errorMessage('Please enter your password');
    }
    if(isset($_POST['phone']) && !empty(trim($_POST['phone']))) {
        $phone = $_POST['phone'];
    } else {
        errorMessage('Please enter your phone number');
    }
    if(isset($_POST['confirm-password']) && !empty(trim($_POST['confirm-password']))) {
        if($password !== false) {
            if($password == $_POST['confirm-password']) {
                $confirmPassword = $_POST['confirm-password'];
            } else {
                errorMessage('Passwords do not match');
            }
        }
    } else {
        errorMessage('Please confirm your password');
    }

    if($firstName !== false && $lastName !== false && $email !== false && $password !== false && $confirmPassword !== false && $phone!==false) {
        $emailInUse = UserManager::CheckIfEmailIsInUse($email);

        if($emailInUse == false) {
            $result = UserManager::RegisterAdmin($firstName, $lastName, $email, $password, $phone);
        
            if($result) {
                successMessage('Registration successful!');
            } else {
                errorMessage('An error occurred, please try again later');
            }
        } else {
            errorMessage('Email is already in use');
        }
    }
}