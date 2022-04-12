<?php
	$page = 'buy-car';
	$pageTitle = 'Buy Car';

	$requiredCSS = ['big-slider-with-text.css', 'buy-car.css'];
	$requiredJS = ['big-slider-with-text.js', 'buy-car.js'];

    $functionalityRequirements = ['search-car-functionality', 'recent-listings-functionality'];

	require_once('includes/header.php'); 
?>
    <!-- SEARCH JUMBOTRON -->
    <div id="search-jumbotron-container">
        <div id="search-jumbotron">
            <div id="search-jumbotron-overlay">
                <div class="row-small">
                    <h1>Your new car <br> <span>awaits</span> you.</h1>
                    <div id="search-menu-container">
                        <form method="GET" id="search-form" action="/buy-car">
                            <label id="search-select-arrow-label">
                                <select name="manufacturer">
                                <option value="default" disabled>Manufacturer</option>
                                <?php foreach($allManufacturers as $m) { ?>
                                    <option value="<?php echo strtolower($m['manufacturer']); ?>" <?php if($manufacturer == strtolower($m['manufacturer'])) { echo 'selected'; } ?>><?php echo ucfirst($m['manufacturer']); ?></option>
                                <?php } ?>
                                </select></label><input type="text" name="model" placeholder="Model"><input name="year" type="number" min="1920" max="2022" placeholder="Year"><input type="submit" value="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(count($foundListings) > 0) { ?>
    <!-- SEARCH RESULTS -->
    <div id="search-results-container" class="section-container">
        <div class="row">
            <h2>Found <span><?php echo $foundListingsCount; ?> <?php echo ($foundListingsCount > 1) ? "listings" : "listing";  ?></span> that <?php echo ($foundListingsCount > 1) ? "match" : "matches"; ?> your criteria...</h2>
            <div id="search-results-wrapper">
                <?php foreach($foundListings as $f) {
                    $car = $f[0];
                    $listing = $f[1];

                    $userManager = new UserManager();
                    $userName = $userManager->GetUserFullNameById($listing['user_id']);

                    $date1 = new DateTime();
                    $date2 = new DateTime($listing['date_listed']);
                    $diff = $date2->diff($date1);

                    $hours = $diff->h;
                ?>
                <div class="card">
                    <div class="card-image" style="background-image: url('<?php echo $car['image1']; ?>');">
                        <p class="price-title">$<?php echo $car['price']; ?></p>
                        <div class="card-title">
                            <p><span><?php echo $car['manufacturer']; ?></span><?php echo $car['model']; ?></p>
                        </div>
                    </div>
                    <div class="card-text">
                        <div class="card-text-lane">
                            <p class="listing-info">Listed <?php echo $hours; ?> hours ago by <a href="#"><?php echo $userName; ?></a></p>
                            <i class="heart-icon" id="heart"><ion-icon name="heart-outline"></ion-icon></i>
                        </div>
                        <p><?php echo substr($car['description'], 0, 100) . '...'; ?></p>
                        <a href="/listing?lid=<?php echo $listing['id']; ?>" class="view-listing-button">View Listing</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } else if($foundListingsCount === 0) { ?>
    <div id="search-results-container" class="section-container">
        <h2>No listings were found that match your criteria...</h2>
    </div>
    <?php } ?>
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
    <!-- BROWSE CATEGORIES -->
    <div id="categories-container" class="section-container">
        <div class="row">
            <h2>Browse vehicle <span>types</span></h2>
            <div id="categories-wrapper">
                <div class="category-card">
                    <a href="?type=sedan">
                        <div class="category-card-image" style="background-image: url('images/car-types/sedan.png');">
                        </div>
                        <div class="category-card-text">
                            <p>Sedan</p>
                        </div>
                    </a>
                </div>
                <div class="category-card">
                    <a href="?type=coupe">
                        <div class="category-card-image" style="background-image: url('images/car-types/coupe.png');">
                        </div>
                        <div class="category-card-text">
                            <p>Coupe</p>
                        </div>
                    </a>
                </div>
                <div class="category-card">
                    <a href="?type=suv">
                        <div class="category-card-image" style="background-image: url('images/car-types/suv.png');">
                        </div>
                        <div class="category-card-text">
                            <p>SUV</p>
                        </div>
                    </a>
                </div>
                <div class="category-card">
                    <a href="?type=crossover">
                        <div class="category-card-image" style="background-image: url('images/car-types/crossover.png');">
                        </div>
                        <div class="category-card-text">
                            <p>Crossover</p>
                        </div>
                    </a>
                </div>
                <div class="category-card">
                    <a href="?type=hatchback">
                        <div class="category-card-image" style="background-image: url('images/car-types/wagon.png');">
                        </div>
                        <div class="category-card-text">
                            <p>Wagon / Hatchback</p>
                        </div>
                    </a>
                </div>
                <div class="category-card">
                    <a href="?type=hybrid">
                        <div class="category-card-image" style="background-image: url('images/car-types/hybrid.png');">
                        </div>
                        <div class="category-card-text">
                            <p>Green Car / Hybrid</p>
                        </div>
                    </a>
                </div>
                <div class="category-card">
                    <a href="?type=convertible">
                        <div class="category-card-image" style="background-image: url('images/car-types/convertible.png');">
                        </div>
                        <div class="category-card-text">
                            <p>Convertible</p>
                        </div>
                    </a>
                </div>
                <div class="category-card">
                    <a href="?type=sports">
                        <div class="category-card-image" style="background-image: url('images/car-types/sports-car.png');">
                        </div>
                        <div class="category-card-text">
                            <p>Sports Car</p>
                        </div>
                    </a>
                </div>
                <div class="category-card">
                    <a href="?type=pickup">
                        <div class="category-card-image" style="background-image: url('images/car-types/pickup-truck.png');">
                        </div>
                        <div class="category-card-text">
                            <p>Pickup Truck</p>
                        </div>
                    </a>
                </div>
                <div class="category-card">
                    <a href="?type=minivan">
                        <div class="category-card-image" style="background-image: url('images/car-types/minivan.png');">
                        </div>
                        <div class="category-card-text">
                            <p>Minivan / Van</p>
                        </div>
                    </a>
                </div>
                <div class="category-card">
                    <a href="?type=electric">
                        <div class="category-card-image" style="background-image: url('images/car-types/electric.png');">
                        </div>
                        <div class="category-card-text">
                        <p>Electric</p>
                        </div>
                    </a>
                </div>
                <div class="category-card">
                    <a href="?type=limo">
                        <div class="category-card-image" style="background-image: url('images/car-types/limo.png');">
                        </div>
                        <div class="category-card-text">
                            <p>Limo</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- BROWSE MANUFACTURERS -->
    <div id="manufacturers-container" class="section-container">
        <div class="row">
            <h2>Browse car <span>manufacturers</span></h2>
            <ul>
                <li><a href="?manufacturer=acura"><p>Acura</p></a></li>
                <li><a href="?manufacturer=alfa romeo"><p>Alfa Romeo</p></a></li>
                <li><a href="?manufacturer=aston martin"><p>Aston Martin</p></a></li>
                <li><a href="?manufacturer=audi"><p>Audi</p></a></li>
                <li><a href="?manufacturer=bentley"><p>Bentley</p></a></li>
                <li><a href="?manufacturer=bmw"><p>BMW</p></a></li>
                <li><a href="?manufacturer=buick"><p>Buick</p></a></li>
                <li><a href="?manufacturer=cadillac"><p>Cadillac</p></a></li>
                <li><a href="?manufacturer=chevrolet"><p>Chevrolet</p></a></li>
                <li><a href="?manufacturer=chrysler"><p>Chrysler</p></a></li>
                <li><a href="?manufacturer=dodge"><p>Dodge</p></a></li>
                <li><a href="?manufacturer=ferrari"><p>Ferrari</p></a></li>
                <li><a href="?manufacturer=fiat"><p>FIAT</p></a></li>
                <li><a href="?manufacturer=ford"><p>Ford</p></a></li>
                <li><a href="?manufacturer=genesis"><p>Genesis</p></a></li>
                <li><a href="?manufacturer=gmc"><p>GMC</p></a></li>
                <li><a href="?manufacturer=honda"><p>Honda</p></a></li>
                <li><a href="?manufacturer=hyundai"><p>Hyundai</p></a></li>
                <li><a href="?manufacturer=infiniti"><p>Infiniti</p></a></li>
                <li><a href="?manufacturer=jaguar"><p>Jaguar</p></a></li>
                <li><a href="?manufacturer=jeep"><p>Jeep</p></a></li>
                <li><a href="?manufacturer=kia"><p>Kia</p></a></li>
                <li><a href="?manufacturer=lamborghini"><p>Lamborghini</p></a></li>
                <li><a href="?manufacturer=land rover"><p>Land Rover</p></a></li>
                <li><a href="?manufacturer=lexus"><p>Lexus</p></a></li>
                <li><a href="?manufacturer=lincoln"><p>Lincoln</p></a></li>
                <li><a href="?manufacturer=lotus"><p>Lotus</p></a></li>
                <li><a href="?manufacturer=maserati"><p>Maserati</p></a></li>
                <li><a href="?manufacturer=mazda"><p>Mazda</p></a></li>
                <li><a href="?manufacturer=mclaren"><p>McLaren</p></a></li>
                <li><a href="?manufacturer=mercedes-benz"><p>Mercedes-Benz</p></a></li>
                <li><a href="?manufacturer=mini"><p>Mini</p></a></li>
                <li><a href="?manufacturer=mitsubishi"><p>Mitsubishi</p></a></li>
                <li><a href="?manufacturer=nissan"><p>Nissan</p></a></li>
                <li><a href="?manufacturer=porsche"><p>Porsche</p></a></li>
                <li><a href="?manufacturer=ram"><p>RAM</p></a></li>
                <li><a href="?manufacturer=rolls-royce"><p>Rolls-Royce</p></a></li>
                <li><a href="?manufacturer=scion"><p>Scion</p></a></li>
                <li><a href="?manufacturer=smart"><p>Smart</p></a></li>
                <li><a href="?manufacturer=subaru"><p>Subaru</p></a></li>
                <li><a href="?manufacturer=tesla"><p>Tesla</p></a></li>
                <li><a href="?manufacturer=toyota"><p>Toyota</p></a></li>
                <li><a href="?manufacturer=volkswagen"><p>Volkswagen</p></a></li>
                <li><a href="?manufacturer=volvo"><p>Volvo</p></a></li>
            </ul>
        </div>
    </div>
<?php require_once('includes/footer.php'); ?>