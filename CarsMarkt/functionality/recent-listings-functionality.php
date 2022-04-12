<?php

// GET 10 RECENT LISTINGS

$listingmanager = new ListingManager();

$recentListings = $listingmanager->GetTenMostRecentListings();

if(count($recentListings) > 0) {
    $recentListingCars = [];

    $carmanager = new CarManager();

    // ADD CAR TO EACH LISTING IN ARRAY
    foreach($recentListings as $r) {
        $recentListingCars[$r['id']] = [];

        $car = $carmanager->GetCarById($r['car_id']);

        array_push($recentListingCars[$r['id']], $r);
        array_push($recentListingCars[$r['id']], $car);
    }
}
