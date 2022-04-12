<?php
class CarManager extends Database
{

    private $cars;
    public function __construct() {
        $this->cars = array();
    }

    public function GetCarByVin($vin)
    {
        $sql = "SELECT * FROM cars WHERE vin = ?;";
        $conn = null;
        try {
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute([$vin]);
            $result = $stmt->fetch();
            if (!empty($result)) {
                $car = new Car(
                    $result['id'],
                    $result['model'],
                    $result['manufacturer'],
                    $result['description'],
                    $result['build_year'],
                    $result['price'],
                    $result['total_mileage'],
                    $result['type'],
                    $result['engine'],
                    $result['fuel_type'],
                    $result['transmission'],
                    $result['drivetrain'],
                    $result['city_mileage'],
                    $result['highway_mileage'],
                    $result['exterior_color'],
                    $result['interior_color'],
                    $result['vin'],
                    $result['convenience_features'],
                    $result['safety_features'],
                    $result['seating_features'],
                    $result['exterior_features'],
                    $result['image1'],
                    $result['image2'],
                    $result['image3'],
                    $result['image4'],
                    $result['image5']
                );
                return $car;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            errorMessage("Unknown error");
        } finally {
            $conn = null;
        }
    }
    public static function GetIDByVin($vin)
    {
        $sql = "SELECT id FROM cars WHERE vin = ?";
        $query = Database::connect()->prepare($sql);
        $query->execute([$vin]);
        $result = $query->fetch()['id'];
        if(!empty($result)) {
            return $result;
        } else {
            return null;
        }
    }
    public static function GetFirstImagePath($id)
    {
        $sql = "SELECT image1 FROM cars WHERE id=?";
        $query = Database::connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch()['image1'];
        if (!empty($result)) {
            return $result;
        }
        else {
            return false;
        }        
    }
    public static function GetSecondImagePath($id)
    {
        $sql = "SELECT image2 FROM cars WHERE id=?";
        $query = Database::connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch()['image2'];
        if (!empty($result)) {
            return $result;
        }
        else {
            return false;
        }        
    }
    public static function GetThirdImagePath($id)
    {
        $sql = "SELECT image3 FROM cars WHERE id=?";
        $query = Database::connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch()['image3'];
        if (!empty($result)) {
            return $result;
        }
        else {
            return false;
        }        
    }
    public static function GetFourthImagePath($id)
    {
        $sql = "SELECT image4 FROM cars WHERE id=?";
        $query = Database::connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch()['image4'];
        if (!empty($result)) {
            return $result;
        }
        else {
            return false;
        }        
    }
    public static function GetFifthImagePath($id)
    {
        $sql = "SELECT image5 FROM cars WHERE id=?";
        $query = Database::connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch()['image5'];
        if (!empty($result)) {
            return $result;
        }
        else {
            return false;
        }        
    }
    public function GetAllCars()
    {
        $cars = [];
        $sql = "SELECT * FROM cars;";
        $query = Database::connect()->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        foreach ($result as $row) {
            $car = new Car($row['id'],$row['model'],$row['manufacturer'],$row['description'],$row['build_year'],$row['price'],$row['total_mileage'],$row['type'],$row['engine']
                    ,$row['fuel_type'],$row['transmission'],$row['drivetrain'],$row['city_mileage'],$row['highway_mileage'],$row['exterior_color'],$row['interior_color']
                    ,$row['vin'],$row['convenience_features'],$row['safety_features'],$row['seating_features'],$row['exterior_features'],$row['image1'],$row['image2'],$row['image3']
                    ,$row['image4'],$row['image5']);
            array_push($cars,$car);
        }
        return $cars;
    }
    
    public static function GetCarManufacturerByID($id)
    {
        $sql = "SELECT manufacturer FROM cars WHERE id=?;";
        $query = Database::connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch()['manufacturer'];
        return $result;
    }

    public static function GetCarModelByID($id)
    {
        $sql = "SELECT model FROM cars WHERE id=?;";
        $query = Database::connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch()['model'];
        return $result;
    }

    public static function GetCarBuildYearByID($id)
    {
        $sql = "SELECT build_year FROM cars WHERE id=?;";
        $query = Database::connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch()['build_year'];
        return $result;
    }
    
    public static function GetCarById($id) {
        $sql = "SELECT * FROM cars WHERE id = ?";

        $query = Database::connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result; 
    }
}
