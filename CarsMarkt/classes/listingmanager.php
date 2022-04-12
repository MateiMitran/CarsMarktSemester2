<?php
class ListingManager extends Database
{
    private $listings;
    public function __construct() {
        $this->listings = array();
    }
    public static function GetListings()
    {
        $listings = [];
        $sql = "SELECT * FROM listings";
        $query = Database::connect()->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        foreach ($result as $row) 
        {
            $listing = new Listing($row['id'],$row['user_id'],$row['car_id'],$row['date_listed']);
            array_push($listings,$listing);
        }
        return $listings;
    }
    public static function RegisterListing($model,$manufacturer,$build_year,$price,$total_mileage,$type,$description,$engine,$fuel_type,
    $transmission,$drivetrain,$city_mileage,$highway_mileage,$exterior_color,$interior_color,$vin,
    $convenience_features,$safety_features,$seating_features,$exterior_features,$image1,$image2,$image3,$image4,$image5)
    {
        $sql = "INSERT INTO cars (model,manufacturer,build_year,price,total_mileage,type,description,engine,fuel_type,transmission,drivetrain,city_mileage,highway_mileage,exterior_color,interior_color,vin,convenience_features,safety_features,seating_features,
                                   exterior_features,image1,image2,image3,image4,image5) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $query = Database::connect()->prepare($sql);
        $result = $query->execute([$model, $manufacturer, $build_year, $price, $total_mileage, $type, $description, $engine, $fuel_type, $transmission, $drivetrain, $city_mileage, $highway_mileage, $exterior_color, $interior_color, $vin, $convenience_features, $safety_features, $seating_features, $exterior_features,$image1,$image2,$image3,$image4,$image5]);
        return $result;
    }
    public static function InsertListing($user_id,$car_id,$date)
    {
        $sql = "INSERT INTO listings (user_id,car_id,date_listed) VALUES (?,?,?);";
        $query = Database::connect()->prepare($sql);
        $result = $query->execute([$user_id,$car_id,$date]);
        return $result;
    }

    public static function GetTenMostRecentListings() {
        $sql = "SELECT * FROM listings ORDER BY date_listed DESC LIMIT 10";
        $query = Database::connect()->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function DeleteListing($car_id) {
        $sql = "DELETE FROM cars WHERE id = ?;";
        $query = Database::connect()->prepare($sql);
        $result = $query->execute([$car_id]);
        return $result;
    }
    public static function GetListingIDByCarID($car_id) {
        $sql = "SELECT id FROM listings WHERE car_id=?;";
        $query = Database::connect()->prepare($sql);
        $result = $query->execute([$car_id]);
        return $result;
    }
}

?>