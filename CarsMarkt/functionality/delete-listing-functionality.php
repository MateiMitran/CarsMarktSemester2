<?php
if(isset($_POST['submit'])) {

$result = ListingManager::DeleteListing($_SESSION['car']->GetID());
if (!empty($result)) {
    successMessage("Deleted listing!");
    redirect_to('create-listing');
}
else {
    errorMessage("An error occured!");
}

}















?>