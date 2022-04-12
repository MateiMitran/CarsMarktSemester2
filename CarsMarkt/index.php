<?php
	$page = 'index';
	$pageTitle = 'Home';

	$requiredCSS = ['index.css', 'big-slider-with-text.css'];
	$requiredJS = ['big-slider-with-text.js', 'index.js'];

	$functionalityRequirements = ['recent-listings-functionality'];

	require_once('includes/header.php');
?>
    <!-- JUMBOTRON -->
    <div id="jumbotron">
        <div id="jumbotron-overlay">
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
                <div id="jumbotron-moto-container">
                    <h1>Cars<span>Markt</span></h1>
                    <h3>The best place to find your next <span>beautiful</span> car</h3>
                    <a href="/register">Join Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- RECENT LISTINGS -->
    <?php if(count($recentListingCars) > 0) { ?>
    <div id="recent-listings-container" class="section-container">
        <h2>Check out these <span>recent</span> listings</h2>
        <div class="big-slider-wrapper" id="recent-listings-slider">
			<button class="slider-navigation-button" id="previous-slide">
				<i><ion-icon name="chevron-back-outline"></ion-icon></i>
			</button>
			<div class="slider-container">
				<div class="slider clearfix">
                <?php
                    foreach($recentListingCars as $r) {
                        $listing = $r[0];
                        $car = $r[1];

                        $date1 = new DateTime();
                        $date2 = new DateTime($listing['date_listed']);
    
                        $diff = $date2->diff($date1);
    
                        $hours = $diff->h;
                ?>
					<a href="/listing?lid=<?php echo $listing['id']; ?>" class="item-link">
						<div
							class="item"
							style="background-image: url('<?php echo $car['image1']; ?>');"
						>
							<div class="item-content">
								<h3><?php echo strtoupper($car['manufacturer']); ?></h3>
							</div>
						</div>
						<div class="item-desc-container">
							<p class="item-desc bold">Listed <?php echo ($hours > 1) ? $hours . ' hours ago' : $hour . ' hour ago'; ?></p>
							<p class="item-desc"><?php echo substr($car['description'], 0, 100) . '...'; ?></p>
						</div>
					</a>
                <?php } ?>
				</div>
			</div>
			<button class="slider-navigation-button" id="next-slide">
				<i><ion-icon name="chevron-forward-outline"></ion-icon></i>
			</button>
		</div>
    </div>
    <?php } ?>
<?php require_once('includes/footer.php'); ?>