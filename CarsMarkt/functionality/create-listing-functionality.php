<?php

$currentUser = $_SESSION['user'];

if(isset($_POST['submit'])) {
$manufacturer = false;
$model = false;
$build_year = false;
$price = false;
$description = false;
$total_mileage = false;
$type = false;
$engine = false;
$fuel_type = false;
$transmission = false;
$drivetrain = false;
$city_mileage = false;
$highway_mileage = false;
$exterior_color = false;
$interior_color = false;
$vin = false;
$convenience_features = false;
$safety_features = false;
$seating_features = false;
$exterior_features = false;
$image1 = false;
$image2 = false;
$image3 = false;
$image4 = false;
$image5 = false;
if(isset($_POST['manufacturer']) && !empty(trim($_POST['manufacturer']))) {
    $manufacturer = $_POST['manufacturer'];
} else {
    errorMessage('Please select a manufacturer');
}
if(isset($_POST['model']) && !empty(trim($_POST['model']))) {
    $model = $_POST['model'];
} else {
    errorMessage('Please input a model');
}
if(isset($_POST['mileage']) && !empty(trim($_POST['mileage']))) {
    $total_mileage = $_POST['mileage'];
} else {
    errorMessage('Please input mileage');
}
if(isset($_POST['year']) && !empty(trim($_POST['year']))) {
    $build_year = $_POST['year'];
} else {
    errorMessage('Please input build year');
}
if(isset($_POST['type']) && !empty(trim($_POST['type']))) {
    $type = $_POST['type'];
} else {
    errorMessage('Please input type');
}
if(isset($_POST['price']) && !empty(trim($_POST['price']))) {
    $price = $_POST['price'];
} else {
    errorMessage('Please input price');
}
if(isset($_POST['description']) && !empty(trim($_POST['description']))) {
    $description = $_POST['description'];
} else {
    errorMessage('Please input description');
}
if(isset($_POST['fuel-type']) && !empty(trim($_POST['fuel-type']))) {
    $fuel_type = $_POST['fuel-type'];
} else {
    errorMessage('Please input fuel type');
}
if(isset($_POST['engine']) && !empty(trim($_POST['engine']))) {
    $engine = $_POST['engine'];
} else {
    errorMessage('Please input engine');
}
if(isset($_POST['drivetrain']) && !empty(trim($_POST['drivetrain']))) {
    $drivetrain = $_POST['drivetrain'];
} else {
    errorMessage('Please input drivetrain');
}
if(isset($_POST['transmission']) && !empty(trim($_POST['transmission']))) {
    $transmission = $_POST['transmission'];
} else {
    errorMessage('Please input transmission');
}
if(isset($_POST['city-mileage']) && !empty(trim($_POST['city-mileage']))) {
    $city_mileage = $_POST['city-mileage'];
} else {
    errorMessage('Please input city mileage');
}
if(isset($_POST['highway-mileage']) && !empty(trim($_POST['highway-mileage']))) {
    $highway_mileage = $_POST['highway-mileage'];
} else {
    errorMessage('Please input city mileage');
}
if(isset($_POST['interior-color']) && !empty(trim($_POST['interior-color']))) {
    $interior_color = $_POST['interior-color'];
} else {
    errorMessage('Please input interior color');
}
if(isset($_POST['exterior-color']) && !empty(trim($_POST['exterior-color']))) {
    $exterior_color = $_POST['exterior-color'];
} else {
    errorMessage('Please input exterior color');
}
if(isset($_POST['vin']) && !empty(trim($_POST['vin']))) {
    $vin = $_POST['vin'];
} else {
    errorMessage('Please input exterior color');
}
if(isset($_POST['convenience']) && !empty(trim($_POST['convenience']))) {
    $convenience_features = $_POST['convenience'];
} else {
    errorMessage('Please input convenience features');
}
if(isset($_POST['entertainment']) && !empty(trim($_POST['entertainment']))) {
    $entertainment_features = $_POST['entertainment'];
} else {
    errorMessage('Please input entertainment features');
}
if(isset($_POST['safety']) && !empty(trim($_POST['safety']))) {
    $safety_features = $_POST['safety'];
} else {
    errorMessage('Please input safety features');
}
if(isset($_POST['seating']) && !empty(trim($_POST['seating']))) {
    $seating_features = $_POST['seating'];
} else {
    errorMessage('Please input seating features');
}
if(isset($_POST['exterior']) && !empty(trim($_POST['exterior']))) {
    $exterior_features = $_POST['exterior'];
} else {
    errorMessage('Please input exterior features');
}
    $image1 = $_FILES['image-1']['name'];
  	$target1 = "carimages/".basename($image1);
  	if (move_uploaded_file($_FILES['image-1']['tmp_name'], $target1)) {
  	}else{
          errorMessage("Image 1 failed");
  	}
    $image2 = $_FILES['image-2']['name'];
  	$target2 = "carimages/".basename($image2);
  	if (move_uploaded_file($_FILES['image-2']['tmp_name'], $target2)) {
  	}else{
          errorMessage("Image 2 failed");
  	}
    $image3 = $_FILES['image-3']['name'];
  	$target3 = "carimages/".basename($image3);
  	if (move_uploaded_file($_FILES['image-3']['tmp_name'], $target3)) {
  	}else{
          errorMessage("Image 3 failed");
  	}
    $image4 = $_FILES['image-4']['name'];
  	$target4 = "carimages/".basename($image4);
  	if (move_uploaded_file($_FILES['image-4']['tmp_name'], $target4)) {
  	}else{
          errorMessage("Image 4 failed");
  	}
    $image5 = $_FILES['image-5']['name'];
  	$target5 = "carimages/".basename($image5);
  	if (move_uploaded_file($_FILES['image-5']['tmp_name'], $target5)) {
  	}else{
          errorMessage("Image 5 failed");
  	}
if ($manufacturer!=null && $model!=null && $build_year!=null && $price!=null && $description!=null && $total_mileage!=null && $type!=null && $engine!=null && $fuel_type!=null && $transmission!=null && $drivetrain!=null && $city_mileage!=null
    && $highway_mileage!=null && $exterior_color!=null && $interior_color!=null && $vin!=null && $convenience_features!=null && $safety_features!=null && $seating_features!=null && $exterior_features!=null && $image1!=null && $image2!=null && $image3!=null && $image4!=null && $image5!=null) {
        $result = ListingManager::RegisterListing($model,$manufacturer,$build_year,$price,$total_mileage,$type,$description,$engine,$fuel_type,
        $transmission,$drivetrain,$city_mileage,$highway_mileage,$exterior_color,$interior_color,$vin,
        $convenience_features,$safety_features,$seating_features,$exterior_features,$target1,$target2,$target3,$target4,$target5);
        if(!empty($result)) {
            
                $car_id = CarManager::GetIDByVin($vin);
                $date = date("Y/m/d");
                $user_id = $_SESSION['user']->GetID();
                $result1 = ListingManager::InsertListing($user_id,$car_id,$date);
                if (!empty($result1)) {
                    successMessage('Successfully created listing!');
                    $_SESSION['car'] = new Car($car_id,$model,$manufacturer,$build_year,$price,$total_mileage,$type,$description,$engine,$fuel_type
                                                ,$transmission,$drivetrain,$city_mileage,$highway_mileage,$exterior_color,$interior_color,$vin
                                                ,$convenience_features,$safety_features,$seating_features,$exterior_features,$target1,$target2,$target3,$target4,$target5);
                    redirect_to("/listing?lid=" . ListingManager::GetListingIDByCarID($car_id));
                }
                else {
                    errorMessage('An error occured');
                }
            } else {
            
                errorMessage('An error occurred, please try again later');
            }
    }
else {

    errorMessage('An error occurred, please try again');
}
}
?>
