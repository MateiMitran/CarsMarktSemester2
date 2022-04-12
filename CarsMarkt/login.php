<?php
	$page = 'login';
	$pageTitle = 'Sign In';

	$requiredCSS = [];
	$requiredJS = [];

    $functionalityRequirements = ['login-functionality'];

	require_once('includes/header.php');
?>
    <!-- TITLE JUMBOTRON -->
    <div class="title-jumbotron" style="background-image: url('images/login/title-jumbotron-image.jpg');">
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
                <h1><span>Welcome back.</span> It's nice to see you.</h1>
            </div>
        </div>
    </div>
    <!-- LOGIN FORM -->
    <form class="simple-form" method="POST" action="login">
        <div class="form-group full">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="form-group full">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="form-group full submit">
            <input type="submit" name="submit" value="Sign In">
        </div>
    </form>
<?php require_once('includes/footer.php'); ?>