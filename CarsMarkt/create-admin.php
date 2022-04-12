<?php
	$page = 'create-admin';
	$pageTitle = 'Create Admin';

	$requiredCSS = ['index.css','create-admin.css'];
	$requiredJS = [];

    $functionalityRequirements = ['register-admin-functionality'];

    require_once('includes/header.php');
?>
    <!-- JUMBOTRON -->
    <div id="jumbotron">
        <div id="jumbotron-overlay">
			<nav id="top-nav" class="transparent absolute">
            
				<ul>
					<li>
						<a href="/admin-home" id="top-nav-account-preferences-button">Home</a>
						<span id="top-nav-button-divider">|</span>
					</li>
                    <li>
                        <form method="POST">
                            <input type="submit" name="logout" id="top-nav-admin-sign-out-button" value="Sign Out">
                        </form>
                    </li>
				</ul>
			</nav>
			<div class="row">
                <div id="jumbotron-moto-container">
                    <h1>Cars<span>Markt</span></h1>
                </div>
            </div>
        </div>
    </div>
    <form class="simple-form" method="POST">
        <div class="form-group full clearfix">
            <div class="form-group-half">
                <label for="last-name">Last Name:</label>
                <input type="text" name="last-name" id="last-name">
            </div>
            <div class="form-group-half">
                <label for="first-name">First Name:</label>
                <input type="text" name="first-name" id="first-name">
            </div>
        </div>
        <div class="form-group full">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="form-group full">
            <label for="phone">Phone:</label>
            <input type="phone" name="phone" id="phone">
        </div>
        <div class="form-group full">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="form-group full">
            <label for="confirm-password">Confirm Password:</label>
            <input type="password" name="confirm-password" id="confirm-password">
        </div>
        <div class="form-group full submit">
            <input type="submit" name="submit" value="Create Admin"></input>
        </div>
    </form>
<?php require_once('includes/footer.php'); ?>