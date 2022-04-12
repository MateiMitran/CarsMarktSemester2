<?php

if(isset($_POST['submit'])) {
    $email = false;
    $password = false;

    // CHECK FOR CORRECT USER INPUT AND ASSIGN VALUES TO VARIABLES IF INPUT IS CORRECT
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

    if($email !== false && $password !== false) {
        $result = UserManager::LogInUser($email, $password);
        
        if($result == 1) {
            // SUCCESSFUL LOGIN
            successMessage('Successfully logged in as user!');
            redirect_to('/buy-car');
        }else if ($result==2) {
            successMessage('Successfully logged in as admin!');
            redirect_to('/admin-home');
        }
        
        else {
            errorMessage('Invalid credentials');
        }
    }
}