<?php
	$page = 'account-preferences';
	$pageTitle = 'Account Preferences';

	$requiredCSS = ['account-preferences.css'];
	$requiredJS = [];
    
    $functionalityRequirements = ['account-preferences-functionality'];
    
	require_once('includes/header.php'); 
?>
    <!-- ACCOUNT FORM -->
    <form class="simple-form" method="POST" action="
    account-preferences">
        <h2>Account Preferences</h2>
        <div class="form-group full clearfix">
            <div class="form-group-half">
                <label for="last-name">Last Name:</label>
                <input type="text" name="last-name" id="last-name" value="<?php echo $currentUser->GetLastName(); ?>">
            </div>
            <div class="form-group-half">
                <label for="first-name">First Name:</label>
                <input type="text" name="first-name" id="first-name" value="<?php echo $currentUser->GetFirstName(); ?>">
            </div>
        </div>
        <div class="form-group full">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $currentUser->GetEmail(); ?>">
        </div>
        <div class="form-group full">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" value="<?php echo $currentUser->GetPhone(); ?>">
        </div>
        <div class="form-group full">
            <label for="new-password">New Password:</label>
            <input type="password" name="new-password" id="new-password">
        </div>
        <div class="form-group full">
            <label for="confirm-new-password">Confirm New Password:</label>
            <input type="password" name="confirm-new-password" id="confirm-new-password">
        </div>
        <div class="form-group full">
            <label for="current-password">Current Password:</label>
            <input type="password" name="current-password" id="current-password">
        </div>
        <div class="form-group full submit">
            <input type="submit" name="submit" value="Save">
        </div>
    </form>
<?php require_once('includes/footer.php'); ?>
