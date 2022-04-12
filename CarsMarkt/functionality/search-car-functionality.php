<?php
$foundListings = [];
$foundListingsCount = false;

$manufacturer = '';
$model = '';
$year = '';
$type = '';
if(isset($_GET['manufacturer'])) {
    $manufacturer = trim($_GET['manufacturer']);
}

if(isset($_GET['model'])) {
    $model = trim($_GET['model']);
}

if(isset($_GET['year'])) {
    $year = trim($_GET['year']);
}
if (isset($_GET['type'])) {
    $type = trim($_GET['type']);
}

// GET CAR MANUFACTURERS
$searchCar = new SearchCar;

$allManufacturers = $searchCar->getAllCarManufacturers();

if((!empty($manufacturer) && !is_null($manufacturer)) || (!empty($model) && !is_null($model)) || (!empty($year) && !is_null($year) || (!empty($type) && !is_null($type))))
{
    // SEARCH CAR AND GET LISTING
    $foundListings = $searchCar->searchForCarAndListing($manufacturer, $model, $year, $type);
    $foundListingsCount = count($foundListings);
}

