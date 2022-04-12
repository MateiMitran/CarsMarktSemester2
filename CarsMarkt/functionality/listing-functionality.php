<?php

$user=false;
if(isset($_GET['lid'])) {
    $listingId = trim($_GET['lid']);

    $searchListing = new SearchListing;

    $listing = $searchListing->searchById($listingId);
    
    if($listing !== false) {
        // FIND LISTING CAR

        $searchCar = new SearchCar;

        $car = $searchCar->searchForCarById($listing['car_id']);

        if($car == false) {
            errorMessage('Could not find car with given id');
            redirect_to('/buy-car');
        } else {
            // FIND LISTING CREATOR
            $userManager = new UserManager();

            $user = $userManager->GetUserById($listing['user_id']);
            if($user == false) {
                errorMessage('Could not find user with given id');
                redirect_to('/buy-car');
            }
        }
    } else {
        errorMessage('Could not find listing with given id');
        redirect_to('/buy-car');
    }
} else {
    redirect_to('/buy-car');
}