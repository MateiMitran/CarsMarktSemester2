<?php
class SearchCar extends Database {
    public function searchForCarAndListing($manufacturer, $model, $year, $type) {
        $sql = "SELECT * FROM cars WHERE ";
        $params = [];

        if($manufacturer != '') {
            $sql .= "manufacturer LIKE ? AND ";
            
            array_push($params, $manufacturer);
        } else if($model != '') {
            $sql .= "model LIKE ? AND ";

            array_push($params, $model);
        } else if($year != '') {
            $sql .= "build_year LIKE ? AND ";

            array_push($params, $year);
        }
          else if($type != '') {
              $sql .= "type LIKE ? AND ";

              array_push($params,$type);
          }

        $sql .= "id > 0";

        $query = Database::connect()->prepare($sql);
        $query->execute($params);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $listings = [];

        
        if(count($result) > 0) {
            $findListing = new FindListing;

            foreach($result as $r) {
                $listing = $findListing->findListingByCarId($r['id']);
                if (!empty($r['id'])) {
                    if($listing['car_id'] == $r['id']) {
                        array_push($listings, array($r, $listing));
                    }
                }
                
            }
        }

        return $listings;
    }

    public function searchForCarById($carId) {
        $sql = "SELECT * FROM cars WHERE id = ?";

        $query = Database::connect()->prepare($sql);
        $query->execute([$carId]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    public function searchForCarByType($type) {
        $sql = "SELECT * FROM cars WHERE type=?;";
        $query = Database::connect()->prepare($sql);
        $query->execute([$type]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getAllCarManufacturers() { 
        $sql = "SELECT DISTINCT manufacturer FROM cars";

        $query = Database::connect()->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}