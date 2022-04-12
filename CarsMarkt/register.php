<?php
	$page = 'register';
	$pageTitle = 'Sign Up';

	$requiredCSS = [];
	$requiredJS = [];

    $functionalityRequirements = ['register-functionality'];

    require_once('includes/header.php');
?>
    <!-- TITLE JUMBOTRON -->
    <div class="title-jumbotron" style="background-image: url('images/register/title-jumbotron-image.jpg');">
        <div class="title-jumbotron-overlay">
            <nav id="top-nav" class="transparent absolute">
				<a href="/" id="logo"><span>Cars</span>Markt</a>
				<!-- LOGGED OUT NAV LINKS -->
				<ul>
					<li>
						<a href="/login" id="top-nav-sign-in-button">Sign In</a>
						<span id="top-nav-button-divider">|</span>
						<a href="/register" id="top-nav-sign-up-button">Sign Up</a>
				    </li>
				</ul>
                <i id="top-nav-ham-menu">
					<ion-icon name="menu"></ion-icon>
            	</i>
			</nav>
            <div class="row">
                <h1>Your new car awaits you.</h1>
            </div>
        </div>
    </div>
    <!-- LOGIN FORM -->
    <form class="simple-form" method="POST" action="register">
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
            <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" placeholder="0123456789">
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
            <input type="submit" name="submit" value="Sign Up">
        </div>
    </form>
<?php require_once('includes/footer.php'); ?>