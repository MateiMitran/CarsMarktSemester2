<?php
	$page = 'listing';
	$pageTitle = 'Listing';

	$requiredCSS = ['listing.css'];
	$requiredJS = ['listing.js'];

    $functionalityRequirements = ['listing-functionality','delete-listing-functionality'];
    
	require_once('includes/header.php');
?>
    <!-- LISTING -->
    <div id="listing-container" class="section-wrapper">
        <div class="row clearfix">
            <!-- LISTING IMAGES -->
            <div id="listing-images-wrapper">
            </div>
            <div id="listing-images-lane">
                <div class="image-thumbnail" style="background-image: url('<?php echo $car['image1']; ?>')" image="<?php echo $car['image1']; ?>"></div>
                <div class="image-thumbnail" style="background-image: url('<?php echo $car['image2']; ?>');" image="<?php echo $car['image2']; ?>"></div>
                <div class="image-thumbnail" style="background-image: url('<?php echo $car['image3']; ?>');" image="<?php echo $car['image3']; ?>"></div>
                <div class="image-thumbnail" style="background-image: url('<?php echo $car['image4']; ?>');" image="<?php echo $car
                ['image4']; ?>"></div>
                <div class="image-thumbnail" style="background-image: url('<?php echo $car['image5']; ?>');" image="<?php echo $car['image5']; ?>"></div>
            </div>
            <div class="listing-section left">
                <!-- TITLE LISTING INFO -->
                <div class="listing-info-wrapper" id="title-info-wrapper">
                    <p id="listing-price">$<?php echo $car['price']; ?></p>
                    <h2><?php echo $car['build_year'] . ' ' . ucfirst($car['manufacturer']) . ' ' . ucfirst($car['model']); ?></h2>
                </div>
                <!-- DESCRIPTION -->
                <div class="listing-info-wrapper">
                    <h3>Description</h3>
                    <p><?php echo $car['description']; ?></p>
                </div>
                <!-- BASIC LISTING INFO -->
                <div class="listing-info-wrapper">
                    <h3>Basics</h3>
                    <ul>
                        <li>
                            <span>Build Year:</span>
                            <?php echo $car['build_year']; ?>
                        </li>
                        <li>
                            <span>Fuel Type:</span>
                            <?php echo ucfirst($car['fuel_type']); ?>
                        </li>
                        <li>
                            <span>City Mileage (km/l):</span>
                            <?php echo $car['city_mileage']; ?>
                        </li>
                        <li>
                            <span>Highway Mileage (km/l):</span>
                            <?php echo $car['highway_mileage']; ?>
                        </li>
                        <li>
                            <span>Drivetrain:</span>
                            <?php echo strtoupper($car['drivetrain']); ?>
                        </li>
                        <li>
                            <span>Engine:</span>
                            <?php echo ucfirst($car['engine']); ?>
                        </li>
                        <li>
                            <span>Mileage:</span>
                            <?php echo ucfirst($car['total_mileage']); ?> km
                        </li>
                        <li>
                            <span>Exterior Color:</span>
                            <?php echo ucfirst($car['exterior_color']); ?>
                        </li>
                        <li>
                            <span>Interior Color:</span>
                            <?php echo ucfirst($car['interior_color']); ?>
                        </li>
                        <li>
                            <span>Transmission:</span>
                            <?php echo ucfirst($car['transmission']); ?>
                        </li>
                        <li>
                            <span>VIN:</span>
                            <?php echo strtoupper($car['vin']); ?>
                        </li>
                    </ul>
                </div>
                <!-- CONVENIENCE LISTING INFO -->
                <div class="listing-info-wrapper">
                    <h3>Convenience</h3>
                    <ul>
                    <?php 
                        $convenience = explode('; ', $car['convenience_features']);

                        foreach($convenience as $c) {
                    ?>
                        <li><?php echo ucfirst($c); ?></li>
                    <?php } ?>
                    </ul>
                </div>
                <!-- SAFETY LISTING INFO -->
                <div class="listing-info-wrapper">
                    <h3>Safety</h3>
                    <ul>
                    <?php 
                        $safety = explode('; ', $car['safety_features']);

                        foreach($safety as $s) {
                    ?>
                        <li><?php echo ucfirst($s); ?></li>
                    <?php } ?>
                    </ul>
                </div>
                <!-- SEATING LISTING INFO -->
                <div class="listing-info-wrapper">
                    <h3>Seating</h3>
                    <ul>
                    <?php 
                        $seating = explode('; ', $car['seating_features']);

                        foreach($seating as $s) {
                    ?>
                        <li><?php echo ucfirst($s); ?></li>
                    <?php } ?>
                    </ul>
                </div>
                <!-- EXTERIOR LISTING INFO -->
                <div class="listing-info-wrapper">
                    <h3>Exterior</h3>
                    <ul>
                    <?php 
                        $exterior = explode('; ', $car['exterior_features']);

                        foreach($exterior as $e) {
                    ?>
                        <li><?php echo ucfirst($e); ?></li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="listing-section right">
                <!-- CONTACT SELLER -->
                <h2>Contact Seller</h2>
                <p><span>Name:</span> <?php echo ucfirst($user['first_name']) . ' ' . ucfirst($user['last_name']); ?></p>
                <p><span>Phone:</span> <?php echo $user['phone']; ?></p>
                <p><span>Email:</span> <?php echo strtolower($user['email']); ?></p>
                
                <?php if ($user['id'] == $_SESSION['user']->GetID()) : ?>
                    <form method="POST">
                    <input type="submit" name="submit" value="Delete Listing">
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php require_once('includes/footer.php'); ?>