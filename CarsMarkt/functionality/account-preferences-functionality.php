<?php

$currentUser = false;
if (isset($_SESSION['user'])) {
    $currentUser = $_SESSION['user'];

if(isset($_POST['submit'])) {
    $firstName = false;
    $lastName = false;
    $email = false;
    $phone = false;
    $newPassword = false;
    $confirmNewPassword = false;
    $currentPassword = false;

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
    
    if(isset($_POST['phone']) && !empty(trim($_POST['phone']))) {
        $phone = trim($_POST['phone']);
    } else {
        $phone = null;
    }

    if(isset($_POST['new-password']) && !empty(trim($_POST['new-password']))) {
        $newPassword = $_POST['new-password'];

        if(isset($_POST['confirm-new-password']) && !empty(trim($_POST['confirm-new-password']))) {
            if($newPassword == $_POST['confirm-new-password']) {
                $confirmNewPassword = $_POST['confirm-new-password'];
            } else {
                errorMessage("Passwords don't match");
            }
        } else {
            errorMessage('Please confirm your new password');
        }
    } else {
        $newPassword = null;
        $confirmNewPassword = null;
    }

    if(isset($_POST['current-password']) && !empty(trim($_POST['current-password']))) {
        $userPassword = $_SESSION['user']->GetPassword();

        $passwordsMatch = password_verify($_POST['current-password'], $userPassword);

        if($passwordsMatch) {
            // CORRECT CURRENT PASSWORD
            $currentPassword = $_POST['current-password'];
        } else {
            errorMessage('Current password is incorrect');
        }
    } else {
        errorMessage('Please enter your current password');
    }

    // UPDATE PREFERENCES
    if($firstName !== false && $lastName !== false && $email !== false && $phone !== false && $newPassword !== false && $confirmNewPassword !== false && $currentPassword !== false) {
        $id = UserManager::GetUserIdByEmail($email);

        if($id == $_SESSION['user']->GetID()) {
            $password;

            if(!empty(trim($newPassword)) && $confirmNewPassword !== null) {
                // SET WITH NEW PASSWORD
                $password = $newPassword;
            } else {
                // SET WITH OLD PASSWORD
                $password = $currentPassword;
            }

            $result = UserManager::UpdateUserPreferences($firstName, $lastName, $email, $password, $phone, $id);
            if(!empty($result))
            {
                // SUCCESSFULLY UPDATED USER PREFERENCES
                

                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $_SESSION['user']->UpdateSessionUserObject($firstName, $lastName, $email, $hashedPassword, $phone);
                successMessage('Successfully updated account information!');
            } else 
            {
                // UNSUCCESSFULLY UPDATED USER PREFERENCES
                errorMessage('An error occurred, please try again later');
            }
        } else {
            errorMessage('An error occurred, please try again later');
        }
    }
}
}
else if (isset($_SESSION['admin']))
{
    $currentUser = $_SESSION['admin'];
    if(isset($_POST['submit'])) {
        $firstName = false;
        $lastName = false;
        $email = false;
        $phone = false;
        $newPassword = false;
        $confirmNewPassword = false;
        $currentPassword = false;
    
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
    
        
        if(isset($_POST['phone']) && !empty(trim($_POST['phone']))) {
            $phone = trim($_POST['phone']);
        } else {
            $phone = null;
        }
    
        if(isset($_POST['new-password']) && !empty(trim($_POST['new-password']))) {
            $newPassword = $_POST['new-password'];
    
            if(isset($_POST['confirm-new-password']) && !empty(trim($_POST['confirm-new-password']))) {
                if($newPassword == $_POST['confirm-new-password']) {
                    $confirmNewPassword = $_POST['confirm-new-password'];
                } else {
                    errorMessage("Passwords don't match");
                }
            } else {
                errorMessage('Please confirm your new password');
            }
        } else {
            $newPassword = null;
            $confirmNewPassword = null;
        }
    
        if(isset($_POST['current-password']) && !empty(trim($_POST['current-password']))) {
            $userPassword = $_SESSION['admin']->GetPassword();
    
            $passwordsMatch = password_verify($_POST['current-password'], $userPassword);
    
            if($passwordsMatch) {
                // CORRECT CURRENT PASSWORD
                $currentPassword = $_POST['current-password'];
            } else {
                errorMessage('Current password is incorrect');
            }
        } else {
            errorMessage('Please enter your current password');
        }
    
        // UPDATE PREFERENCES
        if($firstName !== false && $lastName !== false && $email !== false && $phone !== false && $newPassword !== false && $confirmNewPassword !== false && $currentPassword !== false) {
            $id = UserManager::GetUserIdByEmail($email);
    
            if($id == $_SESSION['admin']->GetID()) {
                $password;
    
                if(!empty(trim($newPassword)) && $confirmNewPassword !== null) {
                    // SET WITH NEW PASSWORD
                    $password = $newPassword;
                } else {
                    // SET WITH OLD PASSWORD
                    $password = $currentPassword;
                }
    
                $result = UserManager::UpdateUserPreferences($firstName, $lastName, $email, $password, $phone, $id);
                if(!empty($result))
                {
                    // SUCCESSFULLY UPDATED USER PREFERENCES
                    
    
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $_SESSION['admin']->UpdateSessionAdminObject($firstName, $lastName, $email, $hashedPassword, $phone);
                    successMessage('Successfully updated account information!');
                } else 
                {
                    // UNSUCCESSFULLY UPDATED USER PREFERENCES
                    errorMessage('An error occurred, please try again later');
                }
            } else {
                errorMessage('An error occurred, please try again later');
            }
        }
    }
}