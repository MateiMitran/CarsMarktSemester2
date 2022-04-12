<?php
	$page = 'create-listing';
	$pageTitle = 'Create Listing';

	$requiredCSS = ['create-listing.css'];
	$requiredJS = ['create-listing.js'];

    $functionalityRequirements = ['create-listing-functionality'];

	require_once('includes/header.php'); 
?>
    <!-- CREATE LISTING FORM -->
    <form class="simple-form listing-form" method="POST" enctype='multipart/form-data'>
        <h2>Create Listing</h2>
        <div class="form-background">
            <div class="form-section">
                <div class="form-group full clearfix">
                    <h3>General</h3>
                    <div class="form-group-half">
                        <label for="model">Model:</label>
                        <input type="text" name="model" id="model">
                    </div>
                    <div class="form-group-half">
                        <label for="manufacturer">Manufacturer:</label>
                        <label class="select-arrow-label">
                        <select name="manufacturer" id="manufacturer">
                            <option value="default" selected disabled>Select Manufacturer</option>
                            <option value="Acura">Acura</option>
                            <option value="Alfa Romeo">Alfa Romeo</option>
                            <option value="Aston Martin">Aston Martin</option>
                            <option value="Audi">Audi</option>
                            <option value="Bentley">Bentley</option>
                            <option value="BMW">BMW</option>
                            <option value="Cadillac">Cadillac</option>
                            <option value="Chevrolet">Chevrolet</option>
                            <option value="Chrysler">Chrysler</option>
                            <option value="Dodge">Dodge</option>
                            <option value="Ferrari">Ferrari</option>
                            <option value="Fiat">Fiat</option>
                            <option value="Ford">Ford</option>
                            <option value="Genesis">Genesis</option>
                            <option value="GMC">GMC</option>
                            <option value="Honda">Honda</option>
                            <option value="Hyundai">Hyundai</option>
                            <option value="Infiniti">Infiniti</option>
                            <option value="Jaguar">Jaguar</option>
                            <option value="Jeep">Jeep</option>
                            <option value="Kia">Kia</option>
                            <option value="Lamborghini">Lamborghini</option>
                            <option value="Land Rover">Land Rover</option>
                            <option value="Lexus">Lexus</option>
                            <option value="Lincoln">Lincoln</option>
                            <option value="Lotus">Lotus</option>
                            <option value="Maserati">Maserati</option>
                            <option value="Mazda">Mazda</option>
                            <option value="McLaren">McLaren</option>
                            <option value="Mercedes">Mercedes</option>
                            <option value="Mini">Mini</option>
                            <option value="Mitubishi">Mitubishi</option>
                            <option value="Nissan">Nissan</option>
                            <option value="Porsche">Porsche</option>
                            <option value="RAM">RAM</option>
                            <option value="Rolls-Royce">Rolls-Royce</option>
                            <option value="Scion">Scion</option>
                            <option value="Smart">Smart</option>
                            <option value="Subaru">Subaru</option>
                            <option value="Tesla">Tesla</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Volkswagen">Volkswagen</option>
                            <option value="Volvo">Volvo</option>
                        </select></label>
                    </div>
                </div>
                <div class="form-group full clearfix">
                    <div class="form-group-half">
                        <label for="mileage">Mileage (km):</label>
                        <input type="number" name="mileage" id="mileage">
                    </div>
                    <div class="form-group-half">
                        <label for="year">Year:</label>
                        <input type="number" name="year" id="year">
                    </div>
                </div>
                <div class="form-group full clearfix">
                    <div class="form-group-half">
                        <label for="type">Type:</label>
                        <label class="select-arrow-label">
                            <select name="type" id="type">
                                <option value="default" selected disabled>Select Type</option>
                                <option value="Sedan">Sedan</option>
                                <option value="Coupe">Coupe</option>
                                <option value="SUV">SUV</option>
                                <option value="Crossover">Crossover</option>
                                <option value="Hatchback">Wagon / Hatchback</option>
                                <option value="Hybrid">Green Car / Hybrid</option>
                                <option value="Convertible">Convertible</option>
                                <option value="Sports Car">Sports Car</option>
                                <option value="Pickup-Truck">Pickup Truck</option>
                                <option value="Minivan">Minivan / Van</option>
                                <option value="Electric">Electric</option>
                                <option value="Limo">Limo</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-group-half">
                        <label for="price">Price (in USD):</label>
                        <input type="number" name="price" id="price">
                    </div>
                </div>
                <div class="form-group full">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description"></textarea>
                </div>
            </div>
            <div class="form-section">
                <h3>Basics</h3>
                <div class="form-group full clearfix">
                    <div class="form-group-half">
                        <label for="fuel-type">Fuel Type:</label>
                        <label class="select-arrow-label">
                            <select name="fuel-type" id="fuel-type">
                                <option value="default" selected disabled>Select Fuel Type</option>
                                <option value="Petrol">Petrol</option>
                                <option value="Diesel">Diesel</option>
                                <option value="LPG">LPG</option>
                                <option value="Electric">Electric</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-group-half">
                        <label for="engine">Engine:</label>
                        <input type="text" name="engine" id="engine">
                    </div>
                </div>
                <div class="form-group full clearfix">
                    <div class="form-group-half">
                        <label for="drivetrain">Drivetrain:</label>
                        <label class="select-arrow-label">
                            <select name="drivetrain" id="drivetrain">
                                <option value="default" selected disabled>Select Drivetrain</option>
                                <option value="AWD">All-Wheel-Drive (AWD)</option>
                                <option value="FWD">Front Wheel Drive (FWD)</option>
                                <option value="RWD">Rear Wheel Drive (RWD)</option>
                                <option value="4WD">4 Wheel Drive (4WD)</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-group-half">
                        <label for="transmission">Transmission:</label>
                        <input type="text" name="transmission" id="transmission">
                    </div>
                </div>
                <div class="form-group full clearfix">
                    <div class="form-group-half">
                        <label for="highway-mileage">Highway Mileage (km/l):</label>
                        <input type="number" name="highway-mileage" id="highway-mileage">
                    </div>
                    <div class="form-group-half">
                        <label for="city-mileage">City Mileage (km/l):</label>
                        <input type="number" name="city-mileage" id="city-mileage">
                    </div>
                </div>
                <div class="form-group full clearfix">
                    <div class="form-group-half">
                        <label for="interior-color">Interior Color:</label>
                        <input type="text" name="interior-color" id="interior-color">
                    </div>
                    <div class="form-group-half">
                        <label for="exterior-color">Exterior Color:</label>
                        <input type="text" name="exterior-color" id="exterior-color">
                    </div>
                </div>
                <div class="form-group full">
                    <label for="vin">VIN:</label>
                    <input type="text" name="vin" id="vin">
                </div>
            </div>
            <div class="form-section">
                <h3>Convenience</h3>
                <div class="form-group full">
                    <label for="convenience">Convenience Features:</label>
                    <input type="text" id="convenience" name="convenience" placeholder="Ex. remote start; adaptive cruise control; navigation system">
                </div>
            </div>
            <div class="form-section">
                <h3>Entertainment</h3>
                <div class="form-group full">
                    <label for="entertainment">Entertainment Features:</label>
                    <input type="text" id="entertainment" name="entertainment" placeholder="Ex. bluetooth; premium sound system">
                </div>
            </div>
            <div class="form-section">
                <h3>Safety</h3>
                <div class="form-group full">
                    <label for="safety">Safety Features:</label>
                    <input type="text" id="safety" name="safety" placeholder="Ex. break assist; stability control">
                </div>
            </div>
            <div class="form-section">
                <h3>Seating</h3>
                <div class="form-group full">
                    <label for="seating">Seating Features:</label>
                    <input type="text" id="seating" name="seating" placeholder="Ex. heated seats; leather seats">
                </div>
            </div>
            <div class="form-section">
                <h3>Exterior</h3>
                <div class="form-group full">
                    <label for="exterior">Exterior Features:</label>
                    <input type="text" id="exterior" name="exterior" placeholder="Ex. sunroof; tow hitch; alloy wheels">
                </div>
            </div>
            <div class="form-section">
                <h3>Images</h3>
                <div class="form-group full">
                    <label for="image-1">Upload Images (up to 5):</label>
                    <div class="select-images-wrapper">
                        <div class="select-image-box">
                            <input type="file" name="image-1" id="image-1" class="inputfile" accept="image/heic, image/jpg, image/png, image/jpeg, image/webp"/>
                            <label for="image-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file...</span></label>
                        </div>
                        <div class="select-image-box">
                            <input type="file" name="image-2" id="image-2" class="inputfile" accept="image/heic, image/jpg, image/png, image/jpeg, image/webp"/>
                            <label for="image-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file...</span></label>
                        </div>
                        <div class="select-image-box">
                            <input type="file" name="image-3" id="image-3" class="inputfile" accept="image/heic, image/jpg, image/png, image/jpeg, image/webp"/>
                            <label for="image-3"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file...</span></label>
                        </div>
                        <div class="select-image-box">
                            <input type="file" name="image-4" id="image-4" class="inputfile" accept="image/heic, image/jpg, image/png, image/jpeg, image/webp"/>
                            <label for="image-4"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file...</span></label>
                        </div>
                        <div class="select-image-box">
                            <input type="file" name="image-5" id="image-5" class="inputfile" accept="image/heic, image/jpg, image/png, image/jpeg, image/webp"/>
                            <label for="image-5"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file...</span></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-section">
                <div class="form-group full submit">
                    <input type="submit" name="submit" value="Create Listing">
                </div>
            </div>
        </div>
    </form>
<?php require_once('includes/footer.php'); ?>